-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2023 at 06:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hcmis`
--

-- --------------------------------------------------------

--
-- Table structure for table `cv_submission`
--

CREATE TABLE `cv_submission` (
  `cv_id` int(191) NOT NULL,
  `vac_id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `address_one` varchar(100) NOT NULL,
  `address_two` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `postal_code` int(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `area_code` int(100) NOT NULL,
  `phone_number` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `degree_level` varchar(100) NOT NULL,
  `cover_letter` mediumtext NOT NULL,
  `resume` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `degree`
--

CREATE TABLE `degree` (
  `degreeid` int(11) NOT NULL,
  `degree` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `degree`
--

INSERT INTO `degree` (`degreeid`, `degree`) VALUES
(6, 'Master'),
(7, 'Bachelor'),
(8, '12 Grad');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `department`) VALUES
(2, 'HRD'),
(8, 'AD'),
(9, 'PM'),
(10, 'IR');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `emp_contract_id` varchar(11) NOT NULL,
  `profile_img` varchar(100) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `father_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthday` varchar(40) NOT NULL,
  `feild_of_study` varchar(40) NOT NULL,
  `mobile_number` varchar(100) NOT NULL,
  `personal_email` varchar(100) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `present_address` varchar(100) NOT NULL,
  `nic` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `id_card_number` varchar(100) NOT NULL,
  `join_date` date NOT NULL,
  `expire_date` date NOT NULL,
  `official_email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `gender` varchar(40) NOT NULL,
  `marital` varchar(40) NOT NULL,
  `country` varchar(40) NOT NULL,
  `role` varchar(40) NOT NULL,
  `province` varchar(40) NOT NULL,
  `degree` varchar(40) NOT NULL,
  `position` varchar(40) NOT NULL,
  `department_id` int(11) NOT NULL,
  `salary` int(40) NOT NULL,
  `contact_person_name` varchar(100) NOT NULL,
  `contact_person_relationship` varchar(100) NOT NULL,
  `contact_person_address` varchar(100) NOT NULL,
  `contact_person_number` varchar(100) NOT NULL,
  `contact_person_email` varchar(100) NOT NULL,
  `contact_person_work` varchar(100) NOT NULL,
  `status` varchar(191) NOT NULL,
  `acc_status` varchar(191) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_modify` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `emp_contract_id`, `profile_img`, `full_name`, `father_name`, `birthday`, `feild_of_study`, `mobile_number`, `personal_email`, `permanent_address`, `present_address`, `nic`, `experience`, `id_card_number`, `join_date`, `expire_date`, `official_email`, `password`, `user`, `gender`, `marital`, `country`, `role`, `province`, `degree`, `position`, `department_id`, `salary`, `contact_person_name`, `contact_person_relationship`, `contact_person_address`, `contact_person_number`, `contact_person_email`, `contact_person_work`, `status`, `acc_status`, `date`, `date_modify`) VALUES
(27, '88 ', '1687097810_1412680551.png', 'Mohamamd Baseer', 'Mohammad Rahim', '2019-02-15', 'BCS', '0783719394', 'mohammadbaseer25@gmail.com', 'kabul', 'kabul, taimani', '1116', '8', '44-002', '2019-02-13', '2019-05-23', 'mohammadbaseer25@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'baseer', 'Male', 'Unmarried', 'Afghanistan', 'HR-Manager', 'Kabul', 'Bachelor', '', 2, 77, 'Mohamamd Baseer', 'Brother', 'kabul, taimani', '0783716394', 'mohammadbaseer25@gmail.com', 'student', '', '', '2019-02-13 08:06:31', '2023-06-18 14:18:42'),
(57, '123gg ', '1687102481_20882074401.png', 'xyz', 'xyz', '2002-05-09', 'BBA', '1234567890', 'xyz@gmail.com', 'abc66', 'abc66', '125', '4', '12388', '2018-01-26', '2023-06-09', 'xyz@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user1', 'Male', 'Married', 'Afghanistan', 'Employee', 'Kabul', 'Master', 'Manager', 9, 123, 'aa', 'aa', 'aa', '1234567890', 'abc@gmail.com', 'adfa', '', '', '2023-06-18 15:25:11', '2023-06-18 16:03:08'),
(60, '123gg ', '1687102469_13037259401.png', 'ABC', 'DEF', '2002-05-09', 'BBA', '1234567890', 'xyz@gmail.com', 'abc66', 'abc66', '125', '4', '12388', '2018-01-26', '2023-06-09', 'xyz@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'user2', 'Male', 'Married', 'Afghanistan', 'Team-Manager', 'Kabul', 'Master', 'Assistant', 8, 123, 'aa', 'aa', 'aa', '1234567890', 'abc@gmail.com', 'adfa', '', '', '2023-06-18 15:34:05', '2023-06-18 16:03:15');

-- --------------------------------------------------------

--
-- Table structure for table `job_t`
--

CREATE TABLE `job_t` (
  `job_id` int(250) NOT NULL,
  `job_title` varchar(1000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `location` varchar(100) NOT NULL,
  `nationality` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `employment_type` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `vacancy` varchar(100) NOT NULL,
  `no_of_jobs` varchar(100) NOT NULL,
  `experience` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `education` varchar(1000) NOT NULL,
  `open_date` date NOT NULL,
  `close_date` date NOT NULL,
  `about_org` varchar(2000) NOT NULL,
  `job_description` varchar(21000) NOT NULL,
  `job_requirement` varchar(21000) NOT NULL,
  `education_details` varchar(100) NOT NULL,
  `skill` varchar(200) NOT NULL,
  `languages` varchar(100) NOT NULL,
  `submission_guideline` varchar(2000) NOT NULL,
  `submission_email` varchar(100) NOT NULL,
  `people_view` varchar(100) NOT NULL,
  `submitted_cv` varchar(100) NOT NULL,
  `open_vac` varchar(100) NOT NULL,
  `cloes_vac` varchar(100) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `announcement_status` varchar(100) NOT NULL,
  `sort_date` varchar(100) NOT NULL,
  `archive_vac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_t`
--

INSERT INTO `job_t` (`job_id`, `job_title`, `location`, `nationality`, `category`, `employment_type`, `salary`, `vacancy`, `no_of_jobs`, `experience`, `gender`, `education`, `open_date`, `close_date`, `about_org`, `job_description`, `job_requirement`, `education_details`, `skill`, `languages`, `submission_guideline`, `submission_email`, `people_view`, `submitted_cv`, `open_vac`, `cloes_vac`, `remark`, `announcement_status`, `sort_date`, `archive_vac`) VALUES
(10, 'Program Officer', 'Kabul', 'Afghan', 'Administrative', 'Full Time', 'NTA-Scale', 'IR-005', '6', ' 4-Year(s)', 'Both', 'BBA', '2018-01-01', '2018-02-28', 'EQUALITY for Peace and Democracy (EPD) is an Afghan non-profit, non-governmental organization founded in 2010 for empowering women and youth at the community and policy levels in Afghanistan. The aim of EPD is to increase the capacity of women and youth so that they are able to represent their needs in development, peacebuilding, and democratic processes.\r\nVision: EPD envisions Afghanistan as a peaceful, prosperous and democratic state where all Afghans enjoy equal rights without any fear or discrimination.\r\nMission: To empower and strengthen women and youth at the community and policy levels, build coalitions and networks, and jointly promote and advocate for human rights, peace, and good governance.\r\n  ', 'Prepare, review and provide legal advice on all legal documents \r\nBuild a strong network and partnership with Provincial and District Government Office the local influential elders, Community Development Council (CDC), District Development Assembly (DDA)\r\nEnsure the establishment of a close working relationship and coordination with Local Shura members particularly those who are involved in conflict resolution and involve them for program implementation\r\nConduct activities as per the work plan\r\nHold workshops and training at the provincial and district levels as per the central office’s instruction\r\nAssist in the preparation of a work plan for the project\r\nEstablish and maintain effective cooperation and coordination mechanism between selected beneficiaries, PGO, Police Headquarter and Justice Department (Huquq Department)\r\nOrganize coordination meeting at district/provincial levels as per the work plan\r\nPrepare financial documents for the conducted activities\r\nMobilize influential elders and conduct network meetings for them\r\nPreparing financial documents for the conducted activities\r\nParticipate in the capacity building programs in Kabul\r\nMaintain, compile data/evidence and update an accurate and proper database to track and follow up with issues to be resolved by the selected beneficiaries through the informal justice system\r\nSupport the research and program department in monitoring and evaluation of the activities\r\nCollect proper means of verification for the conducted activities\r\nMaintain a properly soft and hard archive\r\nEvaluation of the project activities\r\nConduct interviews with different stakeholders as per the instructions\r\nCollect means of verification for the data collection including consent forms, photos, interview recordings, and GPS coordinates\r\nTo perform other duties as requested.\r\n', 'Having a Bachelor degree with two years of experience in the related field\r\n\r\nExperience & Skills:      \r\nExperience in capacity building programs\r\nAbility to prepare operational plans of organization/project\r\nAbility to managing and liaison with outside of organization and project\r\nFluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and language of locals at the duty station\r\nMicrosoft Office packages (Word, Excel, PowerPoint) and Internet\r\nStrong interpersonal and communication skills, innovative and team worker\r\nHonest, active and well mannered\r\nPrevious work with elders, civil society and governmental organizations including PGO\r\nPrevious work experience in working with formal and informal conflict resolution(preferred\r\n', '  \r\nHonest, active and well mannered\r\nPrevious work with elders, civil society and governmental orga', 'MS Office', 'English is Advantage', 'All Applicants are invited to submit their CVs no later than 07/12/2019 to the following e-mail address:\r\nepd.afghanistan@gmail.com\r\nPlease write the post title and or vacancy number in the subject line of your e-mail.\r\nOnly shortlisted candidates will be contacted for the written test and interview.\r\n\r\npreference will be given to those who are from Helmand province.\r\n', 'epd.afghanistan@gmail.com', '', '', '', '', 'publish', '', '', ''),
(11, 'Program Officer', 'Kabul', 'Afghan', 'Administrative', 'Full Time', 'NTA-Scale', 'IR-005', '6', ' 4-Year(s)', '-- Select Gender --', 'BBA', '0000-00-00', '0000-00-00', 'EQUALITY for Peace and Democracy (EPD) is an Afghan non-profit, non-governmental organization founded in 2010 for empowering women and youth at the community and policy levels in Afghanistan. The aim of EPD is to increase the capacity of women and youth so that they are able to represent their needs in development, peacebuilding, and democratic processes.\r\n\r\nVision: EPD envisions Afghanistan as a peaceful, prosperous and democratic state where all Afghans enjoy equal rights without any fear or discrimination.\r\n\r\nMission: To empower and strengthen women and youth at the community and policy levels, build coalitions and networks, and jointly promote and advocate for human rights, peace, and good governance.\r\n  ', 'Prepare, review and provide legal advice on all legal documents \r\nBuild a strong network and partnership with Provincial and District Government Office the local influential elders, Community Development Council (CDC), District Development Assembly (DDA)\r\nEnsure the establishment of a close working relationship and coordination with Local Shura members particularly those who are involved in conflict resolution and involve them for program implementation\r\nConduct activities as per the work plan\r\nHold workshops and training at the provincial and district levels as per the central office’s instruction\r\nAssist in the preparation of a work plan for the project\r\nEstablish and maintain effective cooperation and coordination mechanism between selected beneficiaries, PGO, Police Headquarter and Justice Department (Huquq Department)\r\nOrganize coordination meeting at district/provincial levels as per the work plan\r\nPrepare financial documents for the conducted activities\r\nMobilize influential elders and conduct network meetings for them\r\nPreparing financial documents for the conducted activities\r\nParticipate in the capacity building programs in Kabul\r\nMaintain, compile data/evidence and update an accurate and proper database to track and follow up with issues to be resolved by the selected beneficiaries through the informal justice system\r\nSupport the research and program department in monitoring and evaluation of the activities\r\nCollect proper means of verification for the conducted activities\r\nMaintain a properly soft and hard archive\r\nEvaluation of the project activities\r\nConduct interviews with different stakeholders as per the instructions\r\nCollect means of verification for the data collection including consent forms, photos, interview recordings, and GPS coordinates\r\nTo perform other duties as requested.\r\n', 'Having a Bachelor degree with two years of experience in the related field\r\n\r\nExperience & Skills:      \r\n\r\nExperience in capacity building programs\r\nAbility to prepare operational plans of organization/project\r\nAbility to managing and liaison with outside of organization and project\r\nFluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and language of locals at the duty station\r\nMicrosoft Office packages (Word, Excel, PowerPoint) and Internet\r\nStrong interpersonal and communication skills, innovative and team worker\r\nHonest, active and well mannered\r\nPrevious work with elders, civil society and governmental organizations including PGO\r\nPrevious work experience in working with formal and informal conflict resolution(preferred\r\n', '  \r\n', '', '', 'All Applicants are invited to submit their CVs no later than 07/12/2019 to the following e-mail address:\r\nepd.afghanistan@gmail.com\r\nPlease write the post title and or vacancy number in the subject line of your e-mail.\r\nOnly shortlisted candidates will be contacted for the written test and interview.\r\n\r\npreference will be given to those who are from Helmand province.\r\n', 'epd.afghanistan@gmail.com', '', '', '', '', 'publish', '', '', ''),
(12, 'Program Officer', 'Kabul', 'Afghan', 'Administrative', 'Full Time', 'NTA-Scale', 'IR-005', '6', ' 4-Year(s)', 'Both', 'BBA', '2023-06-18', '2023-06-30', '    EQUALITY for Peace and Democracy (EPD) is an Afghan non-profit, non-governmental organization founded in 2010 for empowering women and youth at the community and policy levels in Afghanistan. The aim of EPD is to increase the capacity of women and youth so that they are able to represent their needs in development, peacebuilding, and democratic processes.\r\n\r\nVision: EPD envisions Afghanistan as a peaceful, prosperous and democratic state where all Afghans enjoy equal rights without any fear or discrimination.\r\n\r\nMission: To empower and strengthen women and youth at the community and policy levels, build coalitions and networks, and jointly promote and advocate for human rights, peace, and good governance.\r\n    ', 'Prepare, review and provide legal advice on all legal documents \r\nBuild a strong network and partnership with Provincial and District Government Office the local influential elders, Community Development Council (CDC), District Development Assembly (DDA)\r\nEnsure the establishment of a close working relationship and coordination with Local Shura members particularly those who are involved in conflict resolution and involve them for program implementation\r\nConduct activities as per the work plan\r\nHold workshops and training at the provincial and district levels as per the central office’s instruction\r\nAssist in the preparation of a work plan for the project\r\nEstablish and maintain effective cooperation and coordination mechanism between selected beneficiaries, PGO, Police Headquarter and Justice Department (Huquq Department)\r\nOrganize coordination meeting at district/provincial levels as per the work plan\r\nPrepare financial documents for the conducted activities\r\nMobilize influential elders and conduct network meetings for them\r\nPreparing financial documents for the conducted activities\r\nParticipate in the capacity building programs in Kabul\r\nMaintain, compile data/evidence and update an accurate and proper database to track and follow up with issues to be resolved by the selected beneficiaries through the informal justice system\r\nSupport the research and program department in monitoring and evaluation of the activities\r\nCollect proper means of verification for the conducted activities\r\nMaintain a properly soft and hard archive\r\nEvaluation of the project activities\r\nConduct interviews with different stakeholders as per the instructions\r\nCollect means of verification for the data collection including consent forms, photos, interview recordings, and GPS coordinates\r\nTo perform other duties as requested.\r\n', 'Having a Bachelor degree with two years of experience in the related field\r\n\r\nExperience & Skills:      \r\n\r\nExperience in capacity building programs\r\nAbility to prepare operational plans of organization/project\r\nAbility to managing and liaison with outside of organization and project\r\nFluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and language of locals at the duty station\r\nMicrosoft Office packages (Word, Excel, PowerPoint) and Internet\r\nStrong interpersonal and communication skills, innovative and team worker\r\nHonest, active and well mannered\r\nPrevious work with elders, civil society and governmental organizations including PGO\r\nPrevious work experience in working with formal and informal conflict resolution(preferred\r\n  \r\n', '   \r\nFluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and l', 'Fluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and language of locals at the duty station  \r\n', 'Fluency in written and spoken Dari and Pashto languages\r\nFamiliar with contexts, culture, and langua', '  All Applicants are invited to submit their CVs no later than 07/12/2019 to the following e-mail address:\r\nepd.afghanistan@gmail.com\r\nPlease write the post title and or vacancy number in the subject line of your e-mail.\r\nOnly shortlisted candidates will be contacted for the written test and interview.\r\n\r\npreference will be given to those who are from Helmand province.\r\n', 'epd.afghanistan@gmail.com', '', '', '', '', 'publish', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `leave_forms`
--

CREATE TABLE `leave_forms` (
  `leave_id` int(11) NOT NULL,
  `employee_id` int(100) NOT NULL,
  `reason` varchar(100) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `responsible_person` varchar(100) NOT NULL,
  `leave_type` varchar(100) NOT NULL,
  `manager` varchar(100) NOT NULL,
  `manager_sign` varchar(100) NOT NULL,
  `hr_sign` varchar(100) NOT NULL,
  `remark` varchar(250) NOT NULL,
  `submit_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_modify` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE `position` (
  `positionid` int(11) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `position`
--

INSERT INTO `position` (`positionid`, `position`) VALUES
(2, 'Assistant'),
(3, 'Officer'),
(4, 'Manager');

-- --------------------------------------------------------

--
-- Table structure for table `resignation`
--

CREATE TABLE `resignation` (
  `r_id` int(191) NOT NULL,
  `emp_id` int(191) NOT NULL,
  `department` varchar(200) NOT NULL,
  `supervisor` varchar(300) NOT NULL,
  `letter` text NOT NULL,
  `team_m_approval` varchar(100) NOT NULL,
  `hr_approval` varchar(100) NOT NULL,
  `remark` varchar(10000) NOT NULL,
  `r_date` date NOT NULL,
  `r_date_modify` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleid` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleid`, `role`) VALUES
(1, 'HR-Manager'),
(2, 'Team-Manager'),
(3, 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `study`
--

CREATE TABLE `study` (
  `studyid` int(11) NOT NULL,
  `study` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `study`
--

INSERT INTO `study` (`studyid`, `study`) VALUES
(2, 'BBA'),
(3, 'BCS'),
(4, 'MCS');

-- --------------------------------------------------------

--
-- Table structure for table `vacancy_view_counter`
--

CREATE TABLE `vacancy_view_counter` (
  `id` int(191) NOT NULL,
  `vac_id` int(191) NOT NULL,
  `ip_address` text NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vacancy_view_counter`
--

INSERT INTO `vacancy_view_counter` (`id`, `vac_id`, `ip_address`, `visit_date`) VALUES
(5, 7, '222.222.222.222', '2019-10-15 17:04:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cv_submission`
--
ALTER TABLE `cv_submission`
  ADD PRIMARY KEY (`cv_id`),
  ADD KEY `job_id` (`vac_id`);

--
-- Indexes for table `degree`
--
ALTER TABLE `degree`
  ADD PRIMARY KEY (`degreeid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department_for_id` (`department_id`);

--
-- Indexes for table `job_t`
--
ALTER TABLE `job_t`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `leave_forms`
--
ALTER TABLE `leave_forms`
  ADD PRIMARY KEY (`leave_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indexes for table `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`positionid`);

--
-- Indexes for table `resignation`
--
ALTER TABLE `resignation`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `resignation` (`emp_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleid`);

--
-- Indexes for table `study`
--
ALTER TABLE `study`
  ADD PRIMARY KEY (`studyid`);

--
-- Indexes for table `vacancy_view_counter`
--
ALTER TABLE `vacancy_view_counter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vac_id` (`vac_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cv_submission`
--
ALTER TABLE `cv_submission`
  MODIFY `cv_id` int(191) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `degree`
--
ALTER TABLE `degree`
  MODIFY `degreeid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `job_t`
--
ALTER TABLE `job_t`
  MODIFY `job_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leave_forms`
--
ALTER TABLE `leave_forms`
  MODIFY `leave_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `position`
--
ALTER TABLE `position`
  MODIFY `positionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `resignation`
--
ALTER TABLE `resignation`
  MODIFY `r_id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `roleid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `study`
--
ALTER TABLE `study`
  MODIFY `studyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vacancy_view_counter`
--
ALTER TABLE `vacancy_view_counter`
  MODIFY `id` int(191) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `department_for_id` FOREIGN KEY (`department_id`) REFERENCES `department` (`departmentid`);

--
-- Constraints for table `leave_forms`
--
ALTER TABLE `leave_forms`
  ADD CONSTRAINT `leave_forms_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `resignation`
--
ALTER TABLE `resignation`
  ADD CONSTRAINT `resignation` FOREIGN KEY (`emp_id`) REFERENCES `employees` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
