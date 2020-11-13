package com.olsmessenger.database.tables;

import lombok.Data;

import java.util.List;

/**
 * @author : Steven Gao
 * @since : 11/13/20, Fri
 **/
@Data
public class User {

    private int id; // do not fill this!!!!! autofill!!
    private String username;
    private String firstName;
    private String lastName;
    private String password;
    private List<String> classes;

}
