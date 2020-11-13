package com.olsmessenger.database;

import com.olsmessenger.database.tables.Class;
import com.olsmessenger.database.tables.User;
import org.redisson.Redisson;
import org.redisson.api.RSet;
import org.redisson.api.RedissonClient;
import org.redisson.config.Config;

import java.util.Optional;
import java.util.Set;

/**
 * @author : Steven Gao
 * @since : 11/13/20, Fri
 **/
public class DatabaseInterface {

    private String redisURL = "redis://176.9.140.143:6379";
    private String password = "scooter";
    private RedissonClient redisson;
    private RSet<User> users;
    private RSet<Class> classes;

    public DatabaseInterface(String redisURL, String password) {
        this.redisURL = redisURL;
        this.password = password;
    }

    public DatabaseInterface() {

    }

    public void connect() {
        Config config = new Config();
        config.useSingleServer().setAddress(redisURL).setPassword(password);
        this.redisson = Redisson.create(config);

        initObjectHolders();
    }

    private void initObjectHolders() {
        users = redisson.getSet("users");
        classes = redisson.getSet("classes");
    }

    public boolean connected() {
        return redisson != null;
    }

    public Set<User> getAllUsers() {
        return users;
    }

    public Optional<User> getUserById(int id) {
        return users.stream().filter(user -> user.getId() == id).findAny();
    }

    public Optional<User> getUserByUsername(String username) {
        return users.stream().filter(user -> user.getUsername().equals(username)).findAny();
    }

    public synchronized void addUser(User user) {
        int index = users.size() + 1;
        user.setId(index);
        users.add(user);
    }

    public void removeUser(int id) {
        getUserById(id).ifPresent(users::remove);
    }

    public void removeUser(User user) {
        users.remove(user);
    }

    public Set<Class> getAllClasses() {
        return classes;
    }

    public void addClass(Class clas) {
        classes.add(clas);
    }

    public Optional<Class> getClassByName(String name) {
        return classes.stream().filter(clas -> clas.getClassName().equals(name)).findAny();
    }

    public void removeClass(String name) {
        getClassByName(name).ifPresent(classes::remove);
    }

    public void removeClass(Class clas) {
        classes.remove(clas);
    }

    public boolean authenticateUser(String username, String password) {
        return getUserByUsername(username).map(user -> user.getPassword().equals(password)).orElse(false);
    }

    public void saveClass(Class clas) {
        getClassByName(clas.getClassName()).ifPresent(classes::remove);
        classes.add(clas);
    }

    public void saveUser(User user) {
        getUserByUsername(user.getUsername()).ifPresent(users::remove);
        users.add(user);
    }

}
