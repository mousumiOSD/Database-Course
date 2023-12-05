<?php

+----------------+          +-----------------+          +-----------------+          +------------------+
|      Book      |          |      Author     |          |     Customer    |          |     Purchase     |
+----------------+          +-----------------+          +-----------------+          +------------------+
| ISBN (PK)      |<--------o| AuthorID (PK)   |<--------o| CustomerID (PK) |          | PurchaseID (PK) |
| Title          |          | Name            |          | Name            |          | PurchaseDate     |
| PublishedDate  |          +-----------------+          | Email           |          +------------------+
| InStock        |<--------o| BooksWritten    |          +-----------------+          | CustomerID (FK)  |
+----------------+          +-----------------+                                        +------------------+
                               |                                                      | BooksPurchased   |
                               o----------------------------------------------------o ISBN (FK)        |
                                                                                                                       


   sql =  CREATE TABLE Book (
    ISBN VARCHAR(13) PRIMARY KEY,
    Title VARCHAR(200),
    PublishedDate DATE,
    InStock BOOLEAN,
    AuthorID INT,
    FOREIGN KEY (AuthorID) REFERENCES Author(AuthorID)
);

   CREATE TABLE Author (
    AuthorID INT PRIMARY KEY,
    Name VARCHAR(255)
);

   CREATE TABLE Customer (
    CustomerID INT PRIMARY KEY,
    Name VARCHAR(255),
    Email VARCHAR(255)
);

  CREATE TABLE Purchase (
    PurchaseID INT PRIMARY KEY,
    PurchaseDate DATE,
    CustomerID INT,
    FOREIGN KEY (CustomerID) REFERENCES Customer(CustomerID)
);

CREATE TABLE Purchase_Book (
    PurchaseID INT,
    ISBN VARCHAR(13),
    PRIMARY KEY (PurchaseID, ISBN),
    FOREIGN KEY (PurchaseID) REFERENCES Purchase(PurchaseID),
    FOREIGN KEY (ISBN) REFERENCES Book(ISBN)
);


SQL Queries:

 //sql = SELECT Title
 //FROM Book
 //WHERE InStock = TRUE
 //ORDER BY PublishedDate DESC
 //LIMIT 20;

 //sql = SELECT *
 //FROM Purchase
 //WHERE PurchaseDate >= '2023-01-01';

 //sql = SELECT *
 //FROM Author
 //WHERE Name LIKE 'Mohammad%' OR Name LIKE 'MD%'
 //ORDER BY Name;
 
                        