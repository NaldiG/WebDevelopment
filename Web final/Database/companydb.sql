-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 02:48 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `companydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `name` varchar(245) DEFAULT NULL,
  `city` varchar(245) DEFAULT NULL,
  `info` varchar(445) DEFAULT NULL,
  `logo` varchar(245) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `username`, `password`, `name`, `city`, `info`, `logo`) VALUES
(3, 'one', '1111', 'Eco Focus', 'New York City', 'Address: 1316 Goldie Lane Cincinnati, OH 45202\r\nPhone Number: 513-460-6593\r\nEmail Address: MichaelLSnyder@dayrep.com', '1cde0ce6193be5736f3a45cf00f86e8d.png'),
(4, 'two', '1111', 'Innovation Arch', 'Los Angeles', 'Address: 4731 Riverwood Drive Chico, CA 95928\r\nPhone Number: 530-343-0912\r\nEmail Address: InnovationArch@jourrapide.com', 'bb31fd51f69af87b29dc8451d5c45205.png'),
(5, 'three', '1111', 'Strat Security', 'Chicago', 'Address: 2684 Timbercrest Road Chuathbaluk, AK 99559\r\nPhone Number: 907-676-0617\r\nEmail Address: StratSecurity@armyspy.com', '6ee82e3e0440d846701474acdc65a6c3.png'),
(6, 'four', '1111', 'Inspire Fitness Co', 'Houston', 'Address: 2131 Harley Vincent Drive Garfield Heights, OH 44125\r\nPhone Number: 440-724-3771\r\nEmail Address: InspireFitness@dayrep.com', 'e027738a308e56b60095b105cb2f4521.jfif'),
(7, 'five', '1111', 'Candor Corp', 'Phoenix', 'Address: 248 Lochmere Lane Avon, CT 06085\r\nPhone Number: 860-404-2092\r\nEmail Address: CandorCorp@jourrapide.com', '9a267e9fbf16dab32930f0a64fc509a0.png'),
(8, 'six', '1111', 'Epic Adventure Inc', 'Philadelphia', 'Address: 2174 Kyle Street Bayard, NE 69334\r\nPhone Number: 308-586-4437\r\nEmail Address: EpicAdventure@rhyta.com', '1c99f1af29abcf5c33e20302c7daa888.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(245) DEFAULT NULL,
  `description` varchar(445) DEFAULT NULL,
  `category` varchar(245) DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `description`, `category`, `company_id`) VALUES
(4, 'Microsoft Certified Trainer', 'Remote candidate will provide Microsoft training and guidance for certification programs, define change initiatives for skills, and implement an organizational rollout of products. Must have 5-10 years of related experience with Microsoft technologies.', 'Computer & IT, Education & Training', 3),
(5, 'Microsoft Solutions Consultant', 'Remote, full-time opportunity. Will be responsible for solution planning, architecture, development, delivery, & ongoing support. Office 365, SharePoint, & related Microsoft product support experience and strong analytical problem-solving skills required.', 'Computer & IT, Technical Support, Consulting', 3),
(6, 'Senior Network Consultant, Microsoft Certified Systems Engineer', 'Seeking experienced Systems Engineer to oversee functionality of IT systems for clients. Install new components, optimize operations, resolve problems. Able to respond to emergencies 24/7. Must be Microsoft Certified. Virtual.', 'Computer & IT, IT Consulting, Technical Support, Engineering, Networking', 4),
(7, 'Dynamics 365 Business Central Technical and Functional Consultant', 'The work-from-home consultant will be assisting customers, engaging in design and development activities, and providing support for software solutions. Implementation experience with Microsoft Dynamics 365 Business Central req. BS degree preferred.', 'Client Services, Computer & IT, Consulting, Education & Training', 4),
(8, 'Mentor - Artificial Intelligence, Azure Data Lake and Azure SQL', 'Provide support and respond to technical inquiries, maintain response time metrics, review student work and provide feedback, and support student engagement.Freelance, remote role. Part-time, flexible hours. Requires familiarity with Azure, SQL, & Python.', 'Education & Training, Database Administration', 5),
(9, 'Principal Solutions Architect', 'Helps win new business, architects Microsoft solutions, manages client engagements, and provides thought leadership. Must have experience with project leadership, pre-sales activities, and relevant Microsoft technologies. Option for telecommuting.', 'System Administration, Software Development', 5),
(10, 'Senior Fitness Editor', 'Full-time, remote position. Duties include editing & publishing 2 - 4 stories per day, brainstorming & pitching timely stories, providing feedback on fitness pitches, conducting keyword research, and assigning stories. 5 - 8 yrs&#39; experience required.', 'Editing, Internet & Ecommerce, News & Journalism, Sports & Fitness, Online Content', 6),
(11, 'Brand Manager, Employer', 'Execute strategic brand and marketing campaigns within a B2B2C environment to drive engagement on both a local and enterprise level. Bachelor&#39;s degree with 4+ years experience in brand marketing required. Full-time, remote position.', 'Advertising & PR, Marketing, Project Management, Sports & Fitness', 6),
(12, 'Phone Customer Support - Outdoor Equipment', 'Work-from-home, contract position for a phone support representative, outdoor equipment. Need Zendesk and customer support experience, preferably support over the phone. Need to be available 10 hours/week, Monday through Saturday, 6:30 am to 4 pm (PST).', 'Customer Service, Sports & Fitness', 6),
(13, 'Head of Security', 'Head of security needed for a full-time, remote position requiring five+ years&#39; experience with Enterprise IT Security, exceptional communication skills, strong problem-solving ability. Will oversee security systems, perform assessments, lead teams.', 'Computer Security, IT Consulting', 7),
(14, 'Security Engineer', 'Remote position will oversee security plan, influence/drive adoption across team, develop, design/implement security solutions, lead risk programs, and collaborate to write/ship security features. BA degree required and five years of experience.', 'Software Development, Computer & IT, Computer Security', 7),
(15, 'Director of Information Security', 'Direct and manage the personnel and the activities for the information security team and focus on product security, security operations, security engineering, and incident responses. A bachelor&#39;s degree is needed. Full-time option for remote.', 'Computer Security, Computer & IT', 7),
(16, 'Content Writers', 'Remote role will write blogs for client sites in solar and green energy, clothing and fashion, and ATV and outdoor adventure or write marketing articles on SEO, content marketing, & marketing trends. He/she will write email copy for marketing automation.', 'Internet & Ecommerce, SEO & SEM, Marketing, Online Marketing, Writing, Online Content', 8),
(17, 'Field Scout Photographer', 'Seeking a field scout photographer for a freelance, mostly remote position responsible for staying at and reviewing camping sites, taking photographs, evaluating facilities and local activities, meeting deadlines.', 'Art & Creative, Photography, Travel & Hospitality', 8),
(18, 'Senior Editor', 'Create content for a community of outdoor enthusiasts and motivate them to protect public lands. Demonstrated success in creating and editing engaging, high-quality content, and generating creative ideas required. Full-time, remote position.', 'Editing, News & Journalism', 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`,`company_id`),
  ADD KEY `fk_jobs_companies_idx` (`company_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `fk_jobs_companies` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
