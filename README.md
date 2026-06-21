# Loan Management System

A full-stack, role-based web application built to digitize a previously paper-based loan tracking process. Developed as my capstone project.

## Overview

This system replaces manual, paper-based borrower record-keeping with a centralized web application. It supports two distinct user roles — **Loan Manager** (admin) and **Loan Officer** — each with their own permissions and dashboard views.

## Features

- **Role-based access control** — separate permissions and views for Loan Managers and Loan Officers
- **Borrower information management** — create, view, update, and securely store borrower records
- **Automated loan calculations** — automatic computation of loan amounts, interest, and payment schedules, reducing manual errors
- **Automated email notifications** — sends payment confirmations and due-date reminders automatically, removing the need to manually call borrowers
- **Centralized loan tracking** — all loan records accessible in one system instead of scattered paper files

## Tech Stack

- **Backend:** Laravel (PHP)
- **Database:** MySQL
- **Frontend:** Tailwind CSS
- **Email:** Laravel Mail (automated notification triggers)

## Why I Built This

This project was built to solve a real workflow problem: loan records were tracked entirely on paper, and officers had to manually call every borrower to remind them of due dates or confirm payments. I designed and built the full system solo — from database schema and backend logic to the front-end UI — to remove that manual overhead and reduce human error in loan calculations.

## Screenshots

### Loan Manager Dashboard

![Loan Manager Dashboard](screenshot/manager-dashboard.png)

### Loan Officer Dashboard

![Loan Officer Dashboard](screenshot/officer-dashboard.png)

### Borrower Records

![Borrower Records](screenshot/borrower-list.png)

## Setup

```bash
git clone <your-repo-url>
cd loan-management-system
composer install
cp .env.example .env
php artisan key:generate
# configure your database and mail credentials in .env
php artisan migrate
npm install && npm run dev
php artisan serve
```

## Author

Carmelo A. Caparas Jr.
[LinkedIn](https://www.linkedin.com/in/carmelo-caparas-4399a9289/)
