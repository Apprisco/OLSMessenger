package com.olsmessenger.database;

import com.olsmessenger.database.tables.User;

import java.util.ArrayList;

/**
 * @author : Steven Gao
 * @since : 11/13/20, Fri
 **/
public class DatabaseTest {

    public static void main(String[] args) {
        DatabaseInterface databaseInterface = new DatabaseInterface();
        databaseInterface.connect();
        User user = new User();
        user.setFirstName("Andrew");
        user.setLastName("Scooter Woo");
        user.setPassword("test");
        user.setUsername("kwoo");
        databaseInterface.addUser(user);
        databaseInterface.getAllUsers().forEach(System.out::println);

        // if you change anything in the class, save user with
        ArrayList<String> classes = new ArrayList<>();
        classes.add("700 mph scooter proj");
        user.setClasses(classes);
        databaseInterface.saveUser(user);
        databaseInterface.getAllUsers().forEach(System.out::println);
    }
}
