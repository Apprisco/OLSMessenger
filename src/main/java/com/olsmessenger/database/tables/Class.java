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
public class Class implements Serializable {

    private String className;
    private List<Integer> userIds = new ArrayList<>(); // user in the class
    private List<ChatLine> chatHistory = new ArrayList<>();

    @Data
    public static class ChatLine {

        private long timestamp;
        private int sender;
        private String line;

    }

}
