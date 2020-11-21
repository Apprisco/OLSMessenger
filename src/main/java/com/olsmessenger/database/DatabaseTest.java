package com.olsmessenger.database;

/**
 * @author : Steven Gao
 * @since : 11/13/20, Fri
 **/
public class DatabaseTest {

    public static void main(String[] args) {
        DatabaseInterface databaseInterface = new DatabaseInterface();
        databaseInterface.connect();
        databaseInterface.getAllUsers().delete();
        databaseInterface.getAllUsers().forEach(System.out::println);
//        databaseInterface.getAllUsers().forEach(databaseInterface::removeUser); // this removes every user
//        databaseInterface.getAllClasses().forEach(databaseInterface::removeClass); // this removes every user
//        System.out.println("Komplit");
//        databaseInterface.getAllUsers().forEach(System.out::println);
//        databaseInterface.getAllClasses().forEach(System.out::println);
//        System.out.println("Komplit2");
    }
}
