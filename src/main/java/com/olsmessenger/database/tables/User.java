package com.olsmessenger.database.tables;

import lombok.Data;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;

/**
 * @author : Steven Gao
 * @since : 11/13/20, Fri
 **/
@Data
public class User implements Serializable {

    private int id; // do not fill this!!!!! autofill!!
    private String username;
    private String firstName;
    private String lastName;
    private String password;
    private List<String> classes = new ArrayList<>();
    public void setId(int id)
    {
    	this.id=id;
    }
    public int getId()
    {
    	return this.id;
    }
    public void setUsername(String username)
    {
    	this.username=username;
    }
    public String getUsername()
    {
    	return this.username;
    }
    public void setFirstName(String firstName)
    {
    	this.firstName=firstName;
    }
    public String getFirstName()
    {
    	return this.firstName;
    }
    public void setLastName(String lastName)
    {
    	this.lastName=lastName;
    }
    public String getLastName()
    {
    	return this.lastName;
    }
    public void setPassword(String password)
    {
    	this.password=password;
    }
    public String getPassword()
    {
    	return this.password;
    }
    public void setClasses(List<String> classes)
    {
    	this.classes=classes;
    }
    public List<String> getClasses()
    {
    	return this.classes;
    }
}
