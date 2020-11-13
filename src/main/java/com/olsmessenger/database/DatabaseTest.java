package com.olsmessenger.database;

import com.olsmessenger.database.tables.User;

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
    }
}
