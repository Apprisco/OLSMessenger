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
//        System.exit(0);

        User user = new User();
        user.setFirstName("Andrew");
        user.setLastName("Scooter Woo");
        user.setPassword("test");
        user.setUsername("kwoo");
        databaseInterface.addUser(user); // this is how to add a user

        user = databaseInterface.getUserById(user.getId()).get(); // this is how to get a user, don't forget to check if the optional exists
        // if you change anything, save user with
        ArrayList<String> classes = new ArrayList<>();
        classes.add("700 mph scooter proj");
        user.setClasses(classes);
        databaseInterface.saveUser(user); // nothing is saved if you don't save the user
        databaseInterface.getAllUsers().forEach(System.out::println);

      databaseInterface.getAllUsers().forEach(databaseInterface::removeUser); // this removes every user
    }
}
