DROP DATABASE IF EXISTS db_job_portal;
CREATE DATABASE db_job_portal;
USE db_job_portal;
CREATE TABLE `Users` (
  `user_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_name` VARCHAR(50) NOT NULL,
  `user_password` VARCHAR(50) NOT NULL,
  `user_email` VARCHAR(100),
  `user_role` VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS `jobs` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `jobTitle` VARCHAR(255),
    `jobLocation` TEXT,
    `employmentType` VARCHAR(255),
    `specifics` VARCHAR(255),
    `agreement` VARCHAR(255),
    `min` INT,
    `max` INT,
    `jobDescription` TEXT,
    `companyName` VARCHAR(255),
    `employees` VARCHAR(255),
    `companyDescription` TEXT,
    `contactPerson` VARCHAR(255),
    `companyLocation` TEXT,
    `displayContactPerson` VARCHAR(255),
    `email` VARCHAR(255),
    `web` VARCHAR(255),
    `typeReceive` VARCHAR(255)
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
('Tech Solutions Inc.', '123 Main St, New York', 'info@techsolutions.com', 'https://www.techsolutions.com', 50, 100, 500, 'Tech Solutions Inc. is not just a software development company; we are a team of passionate individuals who breathe technology. Our expertise lies in transforming ideas into high-quality, innovative software solutions that drive business success. With a global footprint, we have been delivering tailored software applications to businesses across various industries.', 'https://www.shutterstock.com/shutterstock/photos/1862762845/display_1500/stock-vector-abstract-initial-letter-s-logo-blue-overlay-double-water-drops-isolated-on-white-background-1862762845.jpg', '/images/tech_solutions_cover.jpg', 'We strive to innovate and deliver high-quality solutions to our clients...', 'Technology'),
('Marketing Pro LLC', '456 Elm St, Los Angeles', 'contact@marketingpro.com', 'https://www.marketingpro.com', 30, 50, 200, '
    Marketing Pro LLC is a full-service creative digital agency with core expertise in Digital Marketing, Design, and Development. They’re based in the Miami & Fort Lauderdale Area. Here’s what they offer:

    Digital Marketing Services: They provide a wide range of digital marketing services, including:
        Search Engine Optimization (SEO): Improving your website’s visibility on search engines.
        Social Media Marketing (SMM): Managing and optimizing social media platforms.
        Pay-Per-Click (PPC) Management: Creating and managing effective PPC campaigns.
        Ad Management: Handling online advertising campaigns.
        Copywriting: Crafting compelling content for websites and marketing materials.
        Google My Business (GMB) Management: Enhancing your local business presence on Google.
        Link Building: Building high-quality backlinks to improve SEO.
        And more!

    Website Design & Development: They create custom websites tailored to your brand’s personality and target market. Their process includes:
        Web Strategy Planning: Thorough research into your industry, competitors, and target audience.
        Information Architecture: Mapping out landing pages, site structure, and navigation.
        Creative Design: Bringing your website to life with color, branding, and user-friendly design.
        Quality Assurance (QA): Rigorous testing to ensure a superior user experience.
        Launch & Optimization: Setting up servers and finalizing updates.
', 'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/a-logo-design%7C-company-logo-template-7246ba946d6686a9a5b984a1e4380b1b_screen.jpg?ts=1665828706', '/images/marketing_pro_cover.jpg', '
    Passionate Team: Their creative young souls are fueled by extraordinary ideas.
    Comprehensive Services: From SEO to design, they cover all aspects of digital marketing.
    Trusted by Startups: Over 100+ startups and freelance businesses rely on their expertise.
', 'Marketing'),
('Data Insights Co.', '789 Oak St, San Francisco', 'hello@datainsights.co', 'https://www.datainsights.co', 10, 20, 100, 'Data Insights Co. provides advanced data analysis solutions...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQXBwUGajz0YZaTetavuT_BnZFaIYjtsy3hPII0Cmtmg&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQXBwUGajz0YZaTetavuT_BnZFaIYjtsy3hPII0Cmtmg&s', 'We empower organizations with actionable insights from their data...', 'Data Analytics'),
('Design Studio', '101 Pine St, Chicago', 'info@designstudio.com', 'https://www.designstudio.com', 20, 30, 150, 'Design Studio offers creative design services for various industries...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3kFVqXzPkD-7_lywTXlD1xju1yvzz48EHKs9lngRBvA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR3kFVqXzPkD-7_lywTXlD1xju1yvzz48EHKs9lngRBvA&s', 'Our team of designers brings ideas to life through stunning visuals...', 'Design'),
('Financial Experts LLC', '202 Maple St, Houston', 'contact@financialexperts.com', 'https://www.financialexperts.com', 15, 25, 120, 'Financial Experts LLC provides comprehensive accounting services...', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxK8fivAboqqFC6ptQTSH-366XQ06DNivd5v09Q9kSIA&s', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSxK8fivAboqqFC6ptQTSH-366XQ06DNivd5v09Q9kSIA&s', 'We help businesses manage their finances effectively and optimize profitability...', 'Finance');

INSERT INTO jobs (jobTitle, jobLocation, employmentType, specifics, min, max, jobDescription, companyName, employees, companyDescription, contactPerson, companyLocation, email, typeReceive) 
VALUES 
('Database Administrator', 'Ha Noi', 'Part time', 'Specific', '7000', '9000', 'Database administrators analyze and evaluate the data needs of users. They develop and improve the data resources used to store and retrieve critical information. They need the problem-solving skills of the computer science major to correct any malfunctions in databases and to modify systems in line with the evolving needs of users.', 'FPT', '240', 'FPT, officially the FPT Corporation (Vietnamese: Công ty Cổ phần FPT, lit. &#039;FPT Joint Stock Company&#039;; &quot;FPT&quot; stands for Financing and Promoting Technology), is the largest information technology service company in Vietnam with its core business focusing on consulting, providing technology and telecommunications services.', 'Trương Gia Bình', 'Ha Noi', 'email', 'Ha Noi');

INSERT INTO jobs (jobTitle, jobLocation, employmentType, agreement, jobDescription, companyName, employees, companyDescription, contactPerson, companyLocation, displayContactPerson, web, typeReceive) 
VALUES 
('Computer Hardware Engineer', 'Kien Giang', 'Full time', 'Specific', '7000', '9000', 'Computer hardware engineers are responsible for designing, developing, and testing computer components, such as circuit boards, routers, and memory devices. Computer hardware engineers need a combination of creativity and technical expertise. They must be avid learners who stay on top of emerging trends in the field to create hardware that can accommodate the latest programs and applications. Computer hardware engineers must have the perseverance to perform comprehensive tests of systems, again and again, to ensure the hardware is functioning as it should.', 'VNPT', '250-320', 'Vietnam Posts and Telecommunications Group (VNPT, Vietnamese: Tập đoàn Bưu chính Viễn thông Việt Nam), is a telecommunications company, owned by the Vietnamese Government, and the national post office of Vietnam. According to a list of UNDP in 2007, it is the second-largest company in Vietnam. It owns Vinaphone, one of the three largest mobile network operators in Vietnam.', 'Tào Đức Thắng', 'Kien Giang', 'display', 'web', 'thang.tao1997@gmail.com');

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
