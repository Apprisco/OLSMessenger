package com.olsmessenger.database;

import static spark.Spark.*;

import java.util.ArrayList;
import java.util.List;

import com.olsmessenger.database.tables.User;

public class SparkPost {
	private final static String key="scooterman";
	private static DatabaseInterface databaseInterface;
	public static void main(String args[])
	{
		initDb();
		get("/signup",(req,res)->"hi!");
		get("/login",(req,res)->"hi!");
		get("/chat",(req,res)->"hi!");
		get("/classes",(req,res)->"hi!");
		get("/logout",(req,res)->"hi!");
		post("/login", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
		    return "successful!";
		});
		post("/signup", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
			//initial query processing
			String name=request.queryParams("name");
			String email=request.queryParams("email");
			String password=request.queryParams("password");
			String c=request.queryParams("classes");
			//additional query processing
			String firstname=name.substring(0,name.indexOf(" "));
			String lastname=name.substring(name.indexOf(" ")+1);
			String username=email.substring(0,email.indexOf("@"));
			String[] classs=c.split("!");
			List<String> classes = new ArrayList<String>();
			for(String i:classs)if(i.charAt(0)!='F'&&i.charAt(1)!='R')classes.add(i);
			//database input
			if(createUser(firstname,lastname,username,classes,password))return "successful!";
			return "fail!";
		});
		post("/chat", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
		    return "successful!";
		});
		post("/classes", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
		    return "successful!";
		});
		post("/logout", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
		    return "successful!";
		});
	}
	private static void initDb()
	{
		databaseInterface = new DatabaseInterface();
        databaseInterface.connect();
	}
	private static boolean validate(String key2)
	{
		return key.equals(key2);
	}
	private static boolean createUser(String firstname,String lastname,String username,List<String>classes,String password)
	{
		boolean[] repeat=new boolean[2];repeat[0]=true;
		databaseInterface.getAllUsers().forEach((user)->{if((user.getUsername()).equals(username))repeat[0]=false;});
		if(repeat[0]==false)return false;
		User user = new User();
        user.setFirstName(firstname);
        user.setLastName(lastname);
        user.setPassword(password);
        user.setUsername(username);
        user.setClasses(classes);
        databaseInterface.addUser(user); // this is how to add a user
        user = databaseInterface.getUserById(user.getId()).get();
        databaseInterface.saveUser(user);
        databaseInterface.getAllUsers().forEach(System.out::println);
        return true;
	}
}
