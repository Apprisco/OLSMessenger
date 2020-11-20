package com.olsmessenger.database;

import static spark.Spark.*;

public class SparkPost {
	public static void main(String args[])
	{
		initDb();
		post("/login", (request, response) -> {
		    return "successful!";
		});
		post("/signup", (request, response) -> {
		    return "successful!";
		});
		post("/chat", (request, response) -> {
		    return "successful!";
		});
		post("/classes", (request, response) -> {
		    return "successful!";
		});
		post("/logout", (request, response) -> {
		    return "successful!";
		});
	}
	private static void initDb()
	{
		DatabaseInterface databaseInterface = new DatabaseInterface();
        databaseInterface.connect();
        databaseInterface.getAllUsers().forEach(System.out::println);
	}
}
