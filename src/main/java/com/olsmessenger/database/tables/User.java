package com.olsmessenger.database.tables;

import lombok.Data;

import java.io.Serializable;
import java.util.ArrayList;
import java.util.List;
import java.util.Objects;

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

}
