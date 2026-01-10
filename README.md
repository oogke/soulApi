# Soul API

Soul API is a **RESTful API** built with **Laravel PHP**.  
It provides **user authentication, email verification, and notifications**, and is ready to test using Postman or any HTTP client.

---

## **Project Features**

1. User Authentication (register, login, logout)
2. Email Verification
3. Notification System (database notifications)
4. Fully RESTful JSON API
5. Easy integration with frontend or mobile apps

---

## **Prerequisites**

Before running this project, make sure you have:

- Composer installed
- MySQL
- Postman (for API testing)

---

## **Installation Steps**

### 1. Clone the repository

```bash
git clone https://github.com/archanatimilsina/soulApi.git
```
### 2. Install PHP dependencies
composer install

### 3. Configure environment

Copy .env.example to .env:
```
cp .env.example .env
```
Update your database info in your .env file

4. Generate application key

```
php artisan key:generate
```

6. Run
```
php artisan serve
```
to run laravel server

This will create tables for users, notifications, and other project data.

## **Project Description**
This project manages multiple types of data.For each module (Places, Districts, Guides, etc.), CRUD operations are implemented and tested.
Places
Districts
Guides
Cafes
Restaurants
Hotels
Homestays
Events
VehicleHub
AdvenAct


## **API routing** 
### **1. Register**
/api/register (get token after register)
### **2. Login**
/api/login (use that token to login)
### **3. Logout**
/api/logout

## For place
### **1. Places Detail**
/api/places
### **2. Search Place by name ,category , district**
/api/place?category=picnic spot
/api/place?district=bhaktaput
/api/place?name=Chitwan National Park
### **3. Delete Place**
/api/places/1
### **4. Create Place**

## For District
### **1. Districts Detail**
/api/districts
### **2. Show Single District Data**
/api/districts/Bhaktapur
### **3. Search Distrct by name**
/api/district?name=bhaktapur
### **4. Search District by Province name**
/api/district?province=bagmati
### **5. Search District by id**
/api/district?id=6


Similarly, one can access multiple data like events, cafes, restaurants etc. The data used in it are not valid just for learning purpose.

---

**Note :** Routes require Bearer token authorization (from login/register).
