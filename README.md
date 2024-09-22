# Projeeto Project Management Application

**GitHub**: [Projeeto GitHub Repo](https://github.com/nirajdahal/Preojeeto)  
**Live Site**: [Projeeto Live Demo](https://projeeto.onrender.com/)

## Overview
Projeeto is a Kanban-based project management application built using Node.js, React, and MongoDB. It helps project managers assign roles, create boards, manage tasks, and collaborate effectively with team members in real-time.

## Features
- **Kanban Boards**: Manage tasks with boards like To-Do, Doing, and Completed.
- **Project & Task Management**: Assign project managers, upload documents, provide task feedback, and use advanced filters.
- **Advanced Authentication**: Google Authentication, OTP, email verification, and password reset.
- **User Management**: Admins can manage user roles and permissions.
- **Real-time Notifications**: Instant task and project updates using Socket.IO.
- **Dashboard**: Displays project metrics and user stats.

## Tech Stack
- **Frontend**: React, DaisyUI  
- **Backend**: Node.js, Express  
- **Database**: MongoDB, Mongoose  
- **Real-time Communication**: Socket.IO  

## Setup Instructions


### Frontend

1.  Create a .env file in the root of the frontend directory with the following environment variables:
      ```bash
      REACT_APP_BASE_URL=<YOUR_BACKEND_URL>
      REACT_APP_GOOGLE_CLIENT_ID=<YOUR_GOOGLE_CLIENT_ID>
      REACT_APP_GOOGLE_CLIENT_SECRET=<YOUR_GOOGLE_CLIENT_SECRET>
2. Install dependencies:
   ```bash
   npm install
3. Start the React frontend:
   ```bash
   npm run start

### Backend
1. Create a .env file in the root of the backend directory with the following environment variables:
    ```bash
    MONGO_URI=<YOUR_MONGO_URI>
    NODE_ENV=development
    JWT_SECRET=<YOUR_JWT_SECRET>
    EMAIL_HOST=<YOUR_EMAIL_HOST>
    EMAIL_USER=<YOUR_EMAIL_USER>
    EMAIL_PASS=<YOUR_EMAIL_PASS>
    FRONTEND_URL=<YOUR_FRONTEND_URL>
    CRYPTR_KEY=<YOUR_CRYPTR_KEY>
    CLOUDINARY_NAME=<YOUR_CLOUDINARY_NAME>
    CLOUDINARY_API=<YOUR_CLOUDINARY_API_KEY>
    CLOUDINARY_SECRET=<YOUR_CLOUDINARY_SECRET>
2. Install dependencies:
     ```bash
     npm install
3. Run the backend:
      ```bash
       npm run backendl

