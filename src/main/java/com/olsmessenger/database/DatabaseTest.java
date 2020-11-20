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
        databaseInterface.getAllUsers().forEach(databaseInterface::removeUser); // this removes every user
        databaseInterface.getAllClasses().forEach(databaseInterface::removeClass); // this removes every user
        System.out.println("Komplit");
    }
}
