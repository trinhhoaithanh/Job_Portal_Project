DROP DATABASE IF EXISTS db_job_portal;
CREATE DATABASE db_job_portal;
USE db_job_portal;
CREATE TABLE `Users` (
  `user_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_name` VARCHAR(50) NOT NULL,
  `user_password` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(100),
  `user_role` ENUM ('Employer', 'Job Seeker', 'Guest') NOT NULL
);

CREATE TABLE `Jobs` (
  `job_id` INT PRIMARY KEY AUTO_INCREMENT,
  `employer_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  `job_title` VARCHAR(100) NOT NULL,
  `job_description` TEXT,
  `job_location` VARCHAR(100),
  `job_salary` DECIMAL(10,2),
  `date_posted` DATE,
  `job_mode` VARCHAR(50),
  `job_type` VARCHAR(50),
  `category_id` INT
);

CREATE TABLE `CVs` (
  `cv_id` INT PRIMARY KEY AUTO_INCREMENT,
  `seeker_id` INT NOT NULL,
  `cv_file_path` VARCHAR(100),
  `cv_description` TEXT,
  `updated_date` DATE
);

CREATE TABLE `Skills` (
  `skill_id` INT PRIMARY KEY AUTO_INCREMENT,
  `skill_name` VARCHAR(50) NOT NULL
);

CREATE TABLE `UserSkills` (
  `user_skill_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT,
  `skill_id` INT
);

CREATE TABLE `Companies` (
  `company_id` INT PRIMARY KEY AUTO_INCREMENT,
  `company_name` VARCHAR(100) NOT NULL,
  `company_address` VARCHAR(200),
  `company_contact_email` VARCHAR(100),
  `company_website` VARCHAR(200),
  `company_quantity_job` INT,
  `company_quantity_employer` INT,
  `company_quantity_follower` INT,
  `company_desc` TEXT,
  `company_image` TEXT,
  `company_cover_image` TEXT,
  `company_reason` TEXT,
  `company_job_field` VARCHAR(200)
);

CREATE TABLE `Applications` (
  `application_id` INT PRIMARY KEY AUTO_INCREMENT,
  `job_id` INT,
  `user_id` INT,  
  `status` VARCHAR(50)
);

CREATE TABLE `Categories`(
  `category_id` INT PRIMARY KEY AUTO_INCREMENT,
  `category_name` VARCHAR(50),
  `category_job_quantity` INT
);

CREATE TABLE `CompanyPreviews` (
  `preview_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT NOT NULL,
  `company_id` INT NOT NULL,
  `preview_content` TEXT,
  `preview_date` DATE
);

ALTER TABLE `Jobs` ADD FOREIGN KEY (`employer_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Jobs` ADD FOREIGN KEY (`company_id`) REFERENCES `Companies` (`company_id`);

ALTER TABLE `CVs` ADD FOREIGN KEY (`seeker_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `UserSkills` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `UserSkills` ADD FOREIGN KEY (`skill_id`) REFERENCES `Skills` (`skill_id`);

ALTER TABLE `Applications` ADD FOREIGN KEY (`job_id`) REFERENCES `Jobs` (`job_id`);

ALTER TABLE `Applications` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `Jobs` ADD FOREIGN KEY (`category_id`) REFERENCES `Categories` (`category_id`);

ALTER TABLE `CompanyPreviews` ADD FOREIGN KEY (`user_id`) REFERENCES `Users` (`user_id`);

ALTER TABLE `CompanyPreviews` ADD FOREIGN KEY (`company_id`) REFERENCES `Companies` (`company_id`);

-- Inserting data into Users table
INSERT INTO Users (user_name, user_password, user_email, user_role) 
VALUES 
('john_doe', 'password123', 'john@example.com', 'Employer'),
('jane_smith', 'secret456', 'jane@example.com', 'Job Seeker'),
('guest123', 'guestpass', NULL, 'Guest'),
('admin_user', 'admin123', 'admin@example.com', 'Employer'),
('thanh1410', 'Thanh@1410', 'thanh@example.com', 'Job Seeker'),
('test_user', 'test123', 'test@example.com', 'Job Seeker');

INSERT INTO Categories (category_name, category_job_quantity) 
VALUES 
('Software Development', 20),
('Marketing', 15),
('Data Science', 10),
('Design', 8),
('Finance', 12);

INSERT INTO Companies (company_name, company_address, company_contact_email, company_website, company_quantity_job, company_quantity_employer, company_quantity_follower, company_desc, company_image, company_cover_image, company_reason, company_job_field) 
VALUES 
('Tech Solutions Inc.', '123 Main St, New York', 'info@techsolutions.com', 'https://www.techsolutions.com', 50, 100, 500, 'Tech Solutions Inc. is a leading software development company...', 'https://www.shutterstock.com/shutterstock/photos/1862762845/display_1500/stock-vector-abstract-initial-letter-s-logo-blue-overlay-double-water-drops-isolated-on-white-background-1862762845.jpg', '/images/tech_solutions_cover.jpg', 'We strive to innovate and deliver high-quality solutions to our clients...', 'Technology'),
('Marketing Pro LLC', '456 Elm St, Los Angeles', 'contact@marketingpro.com', 'https://www.marketingpro.com', 30, 50, 200, 'Marketing Pro LLC specializes in digital marketing services...', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/a-logo-design%7C-company-logo-template-7246ba946d6686a9a5b984a1e4380b1b_screen.jpg?ts=1665828706', '/images/marketing_pro_cover.jpg', 'Our team is passionate about helping businesses grow their online presence...', 'Marketing'),
('Data Insights Co.', '789 Oak St, San Francisco', 'hello@datainsights.co', 'https://www.datainsights.co', 10, 20, 100, 'Data Insights Co. provides advanced data analysis solutions...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQXBwUGajz0YZaTetavuT_BnZFaIYjtsy3hPII0Cmtmg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQXBwUGajz0YZaTetavuT_BnZFaIYjtsy3hPII0Cmtmg&s', 'We empower organizations with actionable insights from their data...', 'Data Analytics'),
('Design Studio', '101 Pine St, Chicago', 'info@designstudio.com', 'https://www.designstudio.com', 20, 30, 150, 'Design Studio offers creative design services for various industries...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3kFVqXzPkD-7_lywTXlD1xju1yvzz48EHKs9lngRBvA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3kFVqXzPkD-7_lywTXlD1xju1yvzz48EHKs9lngRBvA&s', 'Our team of designers brings ideas to life through stunning visuals...', 'Design'),
('Financial Experts LLC', '202 Maple St, Houston', 'contact@financialexperts.com', 'https://www.financialexperts.com', 15, 25, 120, 'Financial Experts LLC provides comprehensive accounting services...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxK8fivAboqqFC6ptQTSH-366XQ06DNivd5v09Q9kSIA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxK8fivAboqqFC6ptQTSH-366XQ06DNivd5v09Q9kSIA&s', 'We help businesses manage their finances effectively and optimize profitability...', 'Finance');


INSERT INTO Jobs (employer_id, company_id, job_title, job_description, job_location, job_salary, date_posted, job_mode, job_type, category_id) 
VALUES 
(1, 1, 'Software Engineer', 'Seeking an experienced software engineer...', 'New York', 80000.00, '2024-04-25', 'Hybrid', 'Full-time', 1),
(2, 2, 'Marketing Manager', 'We are looking for a skilled marketing manager...', 'Los Angeles', 70000.00, '2024-04-28', 'Onsite', 'Full-time', 2),
(3, 3, 'Data Analyst Intern', 'Exciting opportunity for a data analyst intern...', 'San Francisco', 30000.00, '2024-05-01', 'Remote', 'Intern', 3),
(1, 4, 'Graphic Designer', 'Join our creative team as a graphic designer...', 'Chicago', 60000.00, '2024-05-03', 'Onsite', 'Full-time', 4),
(4, 5, 'Accountant', 'We are hiring an accountant to manage financial records...', 'Houston', 65000.00, '2024-05-05', 'Hybrid', 'Full-time', 5);

INSERT INTO CVs (seeker_id, cv_file_path, cv_description, updated_date) 
VALUES 
(2, '/cv_files/jane_smith_cv.pdf', 'Experienced marketing professional...', '2024-04-30'),
(5, '/cv_files/test_user_cv.pdf', 'Entry-level candidate eager to learn...', '2024-05-03'),
(2, '/cv_files/jane_smith_cv_v2.pdf', 'Updated version of my CV...', '2024-05-05'),
(3, '/cv_files/intern_cv.pdf', 'Aspiring data analyst seeking internship...', '2024-05-01'),
(4, '/cv_files/graphic_designer_cv.pdf', 'Creative designer with experience in Adobe Suite...', '2024-05-02');

INSERT INTO Skills (skill_name) 
VALUES 
('Java'),
('Marketing Strategy'),
('Data Analysis'),
('Graphic Design'),
('Financial Accounting');


INSERT INTO UserSkills (user_id, skill_id) 
VALUES 
(2, 2),
(5, 3),
(2, 4),
(3, 3),
(4, 4);

INSERT INTO Applications (job_id, user_id, status) 
VALUES 
(1, 2, 'Pending'),
(2, 5, 'Submitted'),
(3, 3, 'Reviewed'),
(4, 4, 'Rejected'),
(5, 2, 'Pending');

INSERT INTO CompanyPreviews (user_id, company_id, preview_content, preview_date) 
VALUES 
(2, 1, 'Tech Solutions Inc. is a great company to work for...', '2024-04-30'),
(3, 2, 'I am impressed by Marketing Pro LLC innovative marketing strategies...', '2024-05-01'),
(4, 3, 'Data Insights Co. offers exciting opportunities in the field of data analysis...', '2024-05-02'),
(5, 4, 'Design Studio has a talented team of designers creating amazing work...', '2024-05-03'),
(2, 5, 'Financial Experts LLC provides valuable financial services to businesses...', '2024-05-04');