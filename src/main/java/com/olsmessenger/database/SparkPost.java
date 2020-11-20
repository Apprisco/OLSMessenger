package com.olsmessenger.database;

import static spark.Spark.*;

import java.util.ArrayList;
import java.util.List;
import java.util.NoSuchElementException;

import com.olsmessenger.database.tables.User;
import com.olsmessenger.database.tables.Class;

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
		post("/login", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
			String email=request.queryParams("email");
			String password=request.queryParams("password");
			String username=email.substring(0,email.indexOf("@"));
			return verifyUser(username,password);
		});
		post("/signup", (request, response) -> {
			if(!validate(request.queryParams("key")))return "Failed, wrong auth key.";
			//initial query processing
			String name=request.queryParams("name");
			String email=request.queryParams("email");
			String password=request.queryParams("password");
			String c=request.queryParams("classes");
			//additional query processing
			if(name.indexOf(' ')==-1)return "fail!";
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
			String email=request.queryParams("email");
			String username=email.substring(0,email.indexOf("@"));
		    return getClassesByUser(username);
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
        addWithoutDuplicateClass(classes,user.getId());
        return true;
	}
	private static String verifyUser(String username,String password)
	{
		try {
		User user=databaseInterface.getUserByUsername(username).get();
		if(user==null)return "fail!";
		if(password.equals(user.getPassword()))return user.getFirstName()+" "+user.getLastName();
		return "fail!";}
		catch(NoSuchElementException e){
			return "fail!";
		}
	}
	private static String[] getClassesByUser(String username)
	{
		String[] fail = new String[1];
		fail[0]="fail!";
		try {
			User user=databaseInterface.getUserByUsername(username).get();
			if(user==null)return fail;
			List<String> clas=user.getClasses();
			String[] classes=new String[clas.size()];
			int i=0;
			for(String l:clas)
			{
				classes[i++]=l;
			}
			return classes;
		}
			catch(NoSuchElementException e){
				return fail;
			}
	}
	private static void addWithoutDuplicateClass(List<String> classes, int id)
	{
		for(String i:classes)
		{
			try {
				Class cla=databaseInterface.getClassByName(i).get();
				List<Integer> students=cla.getUserIds();
				students.add(id);
				cla.setUserIds(students);
				databaseInterface.saveClass(cla);
			}
				catch(NoSuchElementException e){
					Class cla=new Class();
					cla.setClassName(i);
					List<Integer> students=cla.getUserIds();
					students.add(id);
					cla.setUserIds(students);
					databaseInterface.addClass(cla);
				}
		}
		databaseInterface.getAllClasses().forEach(System.out::println);
	}
}
