-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 07, 2017 at 11:23 AM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `augurste_calendar`
--

-- --------------------------------------------------------

--
-- Table structure for table `au_admin`
--

CREATE TABLE `au_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_admin`
--

INSERT INTO `au_admin` (`id`, `email`, `password`, `status`, `type`, `last_login`, `created`) VALUES
(1, 'admin@augurstech.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 'admin', '2017-07-04 01:07:55', '2017-04-13 13:23:23');

-- --------------------------------------------------------

--
-- Table structure for table `au_company_stats`
--

CREATE TABLE `au_company_stats` (
  `id` int(11) NOT NULL,
  `date` varchar(250) DEFAULT NULL,
  `ticker` varchar(250) DEFAULT NULL,
  `company` varchar(250) DEFAULT NULL,
  `sector` varchar(250) DEFAULT NULL,
  `industry` varchar(250) DEFAULT NULL,
  `market_cap` varchar(250) DEFAULT NULL,
  `price_earnings` varchar(250) DEFAULT NULL,
  `price_sales` varchar(250) DEFAULT NULL,
  `price_book` varchar(250) DEFAULT NULL,
  `price_cash` varchar(250) DEFAULT NULL,
  `eps` varchar(250) DEFAULT NULL,
  `short_ratio` varchar(250) DEFAULT NULL,
  `roe` varchar(250) DEFAULT NULL,
  `current` varchar(250) DEFAULT NULL,
  `quick` varchar(250) DEFAULT NULL,
  `debt_equity` varchar(250) DEFAULT NULL,
  `gross_m` varchar(250) DEFAULT NULL,
  `recommendation` varchar(250) DEFAULT NULL,
  `earnings` varchar(250) DEFAULT NULL,
  `target_price` varchar(250) DEFAULT NULL,
  `adj_close` varchar(250) DEFAULT NULL,
  `price_group` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_company_stats`
--

INSERT INTO `au_company_stats` (`id`, `date`, `ticker`, `company`, `sector`, `industry`, `market_cap`, `price_earnings`, `price_sales`, `price_book`, `price_cash`, `eps`, `short_ratio`, `roe`, `current`, `quick`, `debt_equity`, `gross_m`, `recommendation`, `earnings`, `target_price`, `adj_close`, `price_group`) VALUES
(1, '09/08/2016', 'A', 'Agilent Technologies Inc.', 'Healthcare', 'Medical Laboratories & Research', '15.30B', '32.27', '3.71', '3.52', '6.96', '1.46', '1.43', '11.50%', '3.10', '2.60', '0.43', '52.00%', 'Strong Buy', 'Aug 17/a', '50.23', '47.02', '$30 to $50'),
(2, '09/08/2016', 'AA', 'Alcoa Inc.', 'Basic Materials', 'Aluminum', '13.31B', '0', '0.63', '1.08', '6.90', '-0.44', '6.33', '-4.70%', '1.50', '0.80', '0.68', '18.20%', 'Buy', 'Oct 06/a', '11.33', '10.12', '$10 to $20'),
(3, '09/08/2016', 'AAAP', 'Advanced Accelerator Applications S.A.', 'Healthcare', 'Diagnostic Substances', '1.36B', '0', '13.69', '3.70', '10.21', '-0.67', '1.39', '-14.80%', '4.50', '4.40', '0.13', '79.30%', 'Strong Buy', 'Aug 31/b', '38.02', '34.68', '$30 to $50'),
(4, '09/08/2016', 'AAC', 'AAC Holdings Inc.', 'Healthcare', 'Specialized Health Services', '442.42M', '99.13', '1.75', '2.70', '60.61', '0.20', '29.92', '3.00%', '2.30', '2.30', '1.02', '0', 'Strong Buy', 'Aug 04/b', '27.33', '19.43', '$10 to $20'),
(5, '09/08/2016', 'AADR', 'AdvisorShares WCM/BNY MlnFcsd GR ADR ETF', 'Financial', 'Exchange Traded Fund', '0', '0', '0', '0', '0', '0', '1.38', '0', '0', '0', '0', '0', 'No Info', 'No Info', '0', '40.81', '$30 to $50'),
(6, '09/08/2016', 'AAL', 'American Airlines Group Inc.', 'Services', 'Major Airlines', '20.69B', '3.78', '0.52', '5.14', '2.91', '10.40', '4.46', '143.90%', '0.70', '0.70', '5.30', '36.20%', 'Buy', 'Jul 22/b', '41.08', '39.35', '$30 to $50'),
(7, '09/08/2016', 'AAMC', 'Altisource Asset Management Corporation', 'Financial', 'Asset Management', '23.58M', '0', '0.25', '0', '0.60', '-6.28', '5.04', '7.30%', '0', '0', '0', '70.10%', 'No Info', 'Aug 08/b', '0', '13.10', '$10 to $20'),
(8, '09/08/2016', 'AAME', 'Atlantic American Corp.', 'Financial', 'Life Insurance', '70.80M', '64.91', '0.43', '0.65', '5.06', '0.05', '0.62', '1.00%', '0', '0', '0.31', '0', 'No Info', 'Aug 11', '0', '3.44', '< $5'),
(9, '09/08/2016', 'AAN', 'Aaron\'s Inc.', 'Services', 'Rental & Leasing Services', '1.83B', '13.85', '0.56', '1.27', '7.54', '1.83', '3.59', '9.60%', '0', '0', '0', '89.40%', 'Strong Buy', 'Jul 29/b', '32.00', '25.41', '$20 to 30'),
(10, '09/08/2016', 'AAOI', 'Applied Optoelectronics Inc.', 'Technology', 'Semiconductor - Integrated Circuits', '335.94M', '74.15', '1.56', '2.05', '7.94', '0.27', '10.23', '2.80%', '2.00', '1.20', '0.52', '30.20%', 'Strong Buy', 'Aug 04/a', '18.88', '20.02', '$20 to 30'),
(11, '09/08/2016', 'AAPC', 'Atlantic Alliance Partnership Corp.', 'Conglomerates', 'Conglomerates', '107.02M', '0', '0', '0.46', '1070.18', '-0.48', '2.54', '0', '0.30', '0.30', '0', '0', 'No Info', 'Aug 12', '0', '10.31', '$10 to $20'),
(12, '09/08/2016', 'AAT', 'American Assets Trust Inc.', 'Financial', 'REIT - Retail', '2.02B', '58.11', '7.07', '2.58', '45.99', '0.77', '2.97', '4.70%', '0', '0', '1.36', '63.80%', 'Strong Buy', 'Jul 26/a', '47.80', '44.63', '$30 to $50'),
(13, '09/08/2016', 'AAU', 'Almaden Minerals Ltd.', 'Basic Materials', 'Gold', '110.08M', '0', '366.94', '4.08', '20.01', '-0.01', '1.46', '-2.10%', '23.60', '0', '0', '0', 'No Info', 'Jun 28', '0', '1.55', '< $5'),
(14, '09/08/2016', 'AAV', 'Advantage Oil & Gas Ltd.', 'Basic Materials', 'Oil & Gas Drilling & Exploration', '1.35B', '270.74', '14.63', '1.46', '0', '0.03', '8.02', '0.40%', '2.20', '2.20', '0', '82.70%', 'Strong Buy', 'Aug 04/a', '8.14', '7.31', '$5 to $10'),
(15, '09/08/2016', 'AAWW', 'Atlas Air Worldwide Holdings Inc.', 'Services', 'Air Services Other', '971.96M', '0', '0.54', '0.67', '6.18', '-1.17', '3.76', '-2.00%', '0.70', '0.70', '1.28', '75.80%', 'Buy', 'Aug 03/b', '53.00', '39.90', '$30 to $50'),
(16, '09/08/2016', 'AAXJ', 'iShares MSCI All Country Asia ex Japan', 'Financial', 'Exchange Traded Fund', '0', '0', '0', '0', '0', '0', '1.94', '0', '0', '0', '0', '0', 'No Info', 'No Info', '0', '61.00', '$50 to $80');

-- --------------------------------------------------------

--
-- Table structure for table `au_milestones`
--

CREATE TABLE `au_milestones` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `days` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `industryType` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_milestones`
--

INSERT INTO `au_milestones` (`id`, `company_id`, `Title`, `description`, `days`, `weight`, `industryType`, `created`) VALUES
(4, 6, 'Check Measure', 'Check Measure Job ready for Production', 15, 1, 'Other', '2017-04-24 13:33:40'),
(3, 6, 'Production Drawings', 'Create Production drawings for the Job', 12, 1, 'Other', '2017-04-24 13:00:47'),
(5, 17, 'calculate Order', 'Order calculation . and number of order', 3, 3, 'Accountant', '2017-05-05 06:22:22'),
(6, 17, 'Software Analysis', 'Analysis software and how much time to develop these requirement. ', 5, 5, 'IT Professional', '2017-05-05 06:23:49'),
(7, 30, 'Software Requirment', 'This is first phase of software development . This phase take the client requirement for development .', 6, 20, 'IT Professional', '2017-05-06 08:32:29'),
(8, 30, 'Software Analysis', 'After taking requirement . This is second of phase of development. IN this phase analysis of requirement. ', 10, 10, 'IT Professional', '2017-05-06 08:34:21'),
(9, 6, 'CNC - Cut Poly for painting', 'CNC parts for painter', 10, 10, 'Other', '2017-06-16 00:54:54'),
(10, 6, 'CNC - Cut Melamine for Job', 'Cut melamine for job', 5, 15, 'Other', '2017-06-16 00:55:54'),
(11, 6, 'Knock Up Cabinets', 'Knock up cabinets ready for Install', 3, 30, 'Other', '2017-06-16 00:56:59'),
(12, 6, 'Install', 'Install Joinery', 0, 0, 'Other', '2017-06-16 00:57:29');

-- --------------------------------------------------------

--
-- Table structure for table `au_pages`
--

CREATE TABLE `au_pages` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `type` varchar(50) NOT NULL,
  `content` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_pages`
--

INSERT INTO `au_pages` (`id`, `title`, `type`, `content`, `created`, `update_dt`) VALUES
(1, 'Home', 'Home_content', '&lt;p&gt;software written for job management that is Calendar based. It needs to be in a modern layout and can work as a stand-alone system for one user or across a network with multiple users. I&amp;#39;m not sure what language would be best suited for that type of application. It will also most likely require some sort of licencing system&lt;/p&gt;\r\n', '2017-04-14 06:47:12', '2017-04-14 01:48:20'),
(2, 'privacy', 'privacy_policy', 'privacy_policy', '2017-04-14 06:57:33', NULL),
(3, 'terms', 'term_of_use', 'terms', '2017-04-14 06:57:33', NULL),
(4, 'Contactus', 'How_to_Reach_Us', 'contactus........', '2017-04-14 09:21:23', NULL),
(5, 'about', 'about', 'about...', '2017-04-14 09:21:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `au_paypalhistory`
--

CREATE TABLE `au_paypalhistory` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `PROFILEID` varchar(100) NOT NULL,
  `PROFILESTATUS` varchar(20) NOT NULL,
  `rawdata` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_paypalhistory`
--

INSERT INTO `au_paypalhistory` (`id`, `user_id`, `PROFILEID`, `PROFILESTATUS`, `rawdata`, `created`) VALUES
(8, 15, 'I-AHAPEAK6F0WU', 'Active', '{\"PROFILEID\":\"I-AHAPEAK6F0WU\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"madhevendra\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-05-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-04-20T10:46:18Z\",\"LASTPAYMENTAMT\":\"30.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"30.00\",\"AGGREGATEAMT\":\"30.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-06T08:22:29Z\",\"CORRELATIONID\":\"fb2f9b902fe4d\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"25237094\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"30.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"30.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-06 08:22:29'),
(7, 6, 'I-NMVDGNL7AMBT', 'Active', '{\"PROFILEID\":\"I-NMVDGNL7AMBT\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-05-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-04-21T01:28:25Z\",\"LASTPAYMENTAMT\":\"5.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"5.00\",\"AGGREGATEAMT\":\"5.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-06T08:22:28Z\",\"CORRELATIONID\":\"e852159923202\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"25237094\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"5.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"5.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-06 08:22:28'),
(9, 33, 'I-9JF4UB6T398R', 'ActiveProfile', '{\"PROFILEID\":\"I-9JF4UB6T398R\",\"PROFILESTATUS\":\"ActiveProfile\",\"TIMESTAMP\":\"2017-05-24T11:13:32Z\",\"CORRELATIONID\":\"86a5d0642a9a\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\"}', '2017-05-24 11:13:32'),
(10, 6, 'I-NMVDGNL7AMBT', 'Active', '{\"PROFILEID\":\"I-NMVDGNL7AMBT\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-20T10:41:32Z\",\"LASTPAYMENTAMT\":\"5.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"10.00\",\"AGGREGATEAMT\":\"10.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-24T11:13:33Z\",\"CORRELATIONID\":\"f20bb5e2945a0\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"5.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"5.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-24 11:13:34'),
(11, 15, 'I-AHAPEAK6F0WU', 'Active', '{\"PROFILEID\":\"I-AHAPEAK6F0WU\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"madhevendra\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-20T10:45:53Z\",\"LASTPAYMENTAMT\":\"30.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"60.00\",\"AGGREGATEAMT\":\"60.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-24T11:13:34Z\",\"CORRELATIONID\":\"3dc2858c955f9\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"30.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"30.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-24 11:13:35'),
(12, 33, 'I-9JF4UB6T398R', 'Active', '{\"PROFILEID\":\"I-9JF4UB6T398R\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-05-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-24T11:13:35Z\",\"CORRELATIONID\":\"2e6914f791253\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-24 11:13:35'),
(13, 33, 'I-F4J1HSJCR51L', 'ActiveProfile', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"PROFILESTATUS\":\"ActiveProfile\",\"TIMESTAMP\":\"2017-05-24T11:16:25Z\",\"CORRELATIONID\":\"77f100c73681a\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\"}', '2017-05-24 11:16:25'),
(14, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-05-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-24T11:16:26Z\",\"CORRELATIONID\":\"fdd9721cdd562\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-05-24 11:16:26'),
(15, 30, 'I-ERVPUJH7PPNR', 'ActiveProfile', '{\"PROFILEID\":\"I-ERVPUJH7PPNR\",\"PROFILESTATUS\":\"ActiveProfile\",\"TIMESTAMP\":\"2017-06-13T07:52:45Z\",\"CORRELATIONID\":\"c5aff032cf5ef\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\"}', '2017-06-13 07:52:45'),
(16, 30, 'I-ERVPUJH7PPNR', 'Active', '{\"PROFILEID\":\"I-ERVPUJH7PPNR\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-06-13T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-13T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-06-13T07:52:46Z\",\"CORRELATIONID\":\"760af85e75fb1\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-06-13 07:52:46'),
(17, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-06-13T07:52:47Z\",\"CORRELATIONID\":\"1abb632766531\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-06-13 07:52:47'),
(18, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-24T21:29:53Z\",\"LASTPAYMENTAMT\":\"90.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-06-13T07:52:48Z\",\"CORRELATIONID\":\"d8c4dde06c23f\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-06-13 07:52:48'),
(19, 30, 'I-YFMJRY239918', 'ActiveProfile', '{\"PROFILEID\":\"I-YFMJRY239918\",\"PROFILESTATUS\":\"ActiveProfile\",\"TIMESTAMP\":\"2017-06-17T10:21:02Z\",\"CORRELATIONID\":\"51e9ba2822f50\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\"}', '2017-06-17 10:21:02'),
(20, 30, 'I-YFMJRY239918', 'Active', '{\"PROFILEID\":\"I-YFMJRY239918\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Small Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-06-17T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-17T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-06-17T10:21:04Z\",\"CORRELATIONID\":\"59eba1c6db764\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"25.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"25.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-06-17 10:21:04'),
(21, 30, 'I-YFMJRY239918', 'Active', '{\"PROFILEID\":\"I-YFMJRY239918\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Small Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-06-17T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-17T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-17T10:25:57Z\",\"LASTPAYMENTAMT\":\"25.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"25.00\",\"AGGREGATEAMT\":\"25.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:51:27Z\",\"CORRELATIONID\":\"93390b1ee471c\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"25.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"25.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:51:27'),
(22, 15, 'I-AHAPEAK6F0WU', 'Active', '{\"PROFILEID\":\"I-AHAPEAK6F0WU\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"madhevendra\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"3\",\"NUMCYCLESREMAINING\":\"18446744073709551613\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-20T10:55:02Z\",\"LASTPAYMENTAMT\":\"30.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:51:28Z\",\"CORRELATIONID\":\"31040b74199c5\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"30.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"30.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:51:28'),
(23, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:51:29Z\",\"CORRELATIONID\":\"a4e3977050317\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:51:29'),
(24, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-24T21:29:53Z\",\"LASTPAYMENTAMT\":\"90.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:51:30Z\",\"CORRELATIONID\":\"12776f045393f\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:51:30'),
(25, 30, 'I-PUJR43S9TYUD', 'ActiveProfile', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"PROFILESTATUS\":\"ActiveProfile\",\"TIMESTAMP\":\"2017-07-04T06:57:08Z\",\"CORRELATIONID\":\"b8772db49c9d1\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\"}', '2017-07-04 06:57:08'),
(26, 30, 'I-PUJR43S9TYUD', 'Active', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-07-04T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-04T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:09Z\",\"CORRELATIONID\":\"d837f8c531a46\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:09'),
(27, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:10Z\",\"CORRELATIONID\":\"af7823c9209bb\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:10'),
(28, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-24T21:29:53Z\",\"LASTPAYMENTAMT\":\"90.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:11Z\",\"CORRELATIONID\":\"ae342e6e16828\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:11'),
(29, 30, 'I-PUJR43S9TYUD', 'Active', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-07-04T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-04T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:39Z\",\"CORRELATIONID\":\"a7f4996e541bb\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:39'),
(30, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:40Z\",\"CORRELATIONID\":\"45c046ee5c458\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:40'),
(31, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-24T21:29:53Z\",\"LASTPAYMENTAMT\":\"90.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:57:41Z\",\"CORRELATIONID\":\"fe9819984e352\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 06:57:41'),
(32, 30, 'I-PUJR43S9TYUD', 'Active', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-07-04T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-04T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"0\",\"NUMCYCLESREMAINING\":\"0\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"0.00\",\"AGGREGATEAMT\":\"0.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T07:05:55Z\",\"CORRELATIONID\":\"2c024c487996c\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 07:05:55'),
(33, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T07:06:14Z\",\"CORRELATIONID\":\"c7b66d8a71ff2\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 07:06:14'),
(34, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-24T21:29:53Z\",\"LASTPAYMENTAMT\":\"90.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T07:06:20Z\",\"CORRELATIONID\":\"adf15cbd68d1a\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-04 07:06:20'),
(35, 30, 'I-PUJR43S9TYUD', 'Active', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-07-04T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-08-04T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-07-04T11:13:28Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"50.00\",\"AGGREGATEAMT\":\"50.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:29Z\",\"CORRELATIONID\":\"10b99ea6aa6a3\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-07 05:45:29'),
(36, 20, 'I-TBTBY1D3P0NV', 'Active', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:30Z\",\"CORRELATIONID\":\"7eb00d8dd9179\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-07 05:45:30'),
(37, 33, 'I-F4J1HSJCR51L', 'Active', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"90.00\",\"FAILEDPAYMENTCOUNT\":\"1\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:31Z\",\"CORRELATIONID\":\"bf197013e0c33\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', '2017-07-07 05:45:31');

-- --------------------------------------------------------

--
-- Table structure for table `au_plans`
--

CREATE TABLE `au_plans` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price_monthly` float NOT NULL,
  `price_yearly` float NOT NULL,
  `free_days` int(11) NOT NULL,
  `employees` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `trail` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_plans`
--

INSERT INTO `au_plans` (`id`, `title`, `description`, `price_monthly`, `price_yearly`, `free_days`, `employees`, `status`, `trail`, `created`) VALUES
(1, 'Small Package', '&lt;ul class=&quot;options&quot;&gt;&lt;li&gt;15&lt;span&gt; Employees Allow&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', 25, 0, 0, 15, 1, 1, '2017-04-13 13:51:38'),
(2, 'Normal Package', '&lt;ul class=&quot;options&quot;&gt;&lt;li&gt;25&lt;span&gt; Employees Allow&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', 50, 0, 0, 25, 1, 1, '2017-04-14 09:57:33'),
(3, 'Big Package', '&lt;ul class=&quot;options&quot;&gt;&lt;li&gt;100&lt;span&gt; Employees Allow&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', 90, 0, 0, 100, 1, 1, '2017-04-14 11:34:14'),
(6, 'Lowset Plan', '&lt;ul class=&quot;options&quot;&gt;&lt;li&gt;10&lt;span&gt; Employees Allow&lt;/span&gt;&lt;/li&gt;&lt;/ul&gt;', 20, 0, 0, 10, 1, 1, '2017-04-20 07:28:05');

-- --------------------------------------------------------

--
-- Table structure for table `au_tasks`
--

CREATE TABLE `au_tasks` (
  `id` int(11) NOT NULL,
  `cid` varchar(100) NOT NULL,
  `company_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `title` varchar(200) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `milestone_id` int(11) NOT NULL,
  `task_group` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_tasks`
--

INSERT INTO `au_tasks` (`id`, `cid`, `company_id`, `start_date`, `end_date`, `title`, `employee_id`, `milestone_id`, `task_group`, `created`) VALUES
(58, '14934668713', 6, '2017-04-25 03:45:00', '2017-04-25 03:50:00', 'New event 2', 0, 0, '', '2017-04-29 11:54:43'),
(57, '14934668099', 6, '2017-04-27 01:45:00', '2017-04-27 01:50:00', 'New event 2', 0, 0, '', '2017-04-29 11:53:35'),
(67, '14934676525', 6, '2017-04-24 01:15:00', '2017-04-24 03:50:00', 'this is test task', 10, 4, '', '2017-04-29 12:09:54'),
(54, '14934666259', 6, '2017-04-26 02:25:00', '2017-04-26 02:30:00', 'New event', 0, 0, '', '2017-04-29 11:51:01'),
(65, '14934676311', 6, '2017-04-27 04:35:00', '2017-04-27 04:40:00', 'New event', 0, 0, '', '2017-04-29 12:07:17'),
(68, '14937136813', 6, '2017-05-01 01:15:00', '2017-05-01 01:20:00', 'New event', 0, 0, '', '2017-05-02 08:28:04'),
(71, '14939681904', 17, '2017-05-03 03:05:00', '2017-05-03 03:10:00', 'Test Task', 21, 6, '', '2017-05-05 07:10:03'),
(74, '14939682431', 17, '2017-05-02 01:40:00', '2017-05-02 01:45:00', 'Test Task other', 21, 6, '', '2017-05-05 07:11:04'),
(72, '14939681904', 17, '2017-05-03 03:05:00', '2017-05-03 03:10:00', 'Test Task', 21, 6, '', '2017-05-05 07:10:07'),
(77, '14939684237', 17, '2017-05-04 04:50:00', '2017-05-04 04:55:00', 'Today task', 21, 5, '', '2017-05-05 07:17:28'),
(104, '1493981211177', 17, '2017-05-06 03:10:00', '2017-05-06 03:15:00', 'New event', 0, 0, '', '2017-05-05 10:47:05'),
(87, '14939760742', 17, '2017-05-04 01:00:00', '2017-05-04 01:05:00', 'New event', 21, 6, '', '2017-05-05 09:22:19'),
(103, '1493978211209', 17, '2017-05-07 00:35:00', '2017-05-07 00:40:00', 'Imortant task', 21, 6, '', '2017-05-05 09:57:37'),
(97, '1493977388347', 17, '2017-05-05 05:50:00', '2017-05-05 05:55:00', 'New event', 0, 0, '', '2017-05-05 09:43:19'),
(110, '1494059923817', 30, '2017-05-06 01:40:00', '2017-05-06 02:15:00', 'Event For create Wordpress Plugin ,                                                                                                                                                                     ', 31, 8, '', '2017-05-06 08:40:24'),
(111, '1494059923827', 30, '2017-05-07 00:00:00', '2017-05-12 00:00:00', 'Analysis of the project .                                                                                                                                                                               ', 31, 8, '', '2017-05-06 08:41:38'),
(206, '1499151547373', 30, '2017-07-10 01:15:00', '2017-07-10 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(205, '1499151547373', 30, '2017-07-09 01:15:00', '2017-07-09 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(162, '1497351515979', 30, '2017-06-16 07:35:00', '2017-06-16 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(161, '1497351515979', 30, '2017-06-15 07:35:00', '2017-06-15 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(138, '1497351187181', 30, '2017-06-14 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(160, '1497351515979', 30, '2017-06-14 07:35:00', '2017-06-14 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(204, '1499151547373', 30, '2017-07-08 01:15:00', '2017-07-08 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(199, '1499151547373', 30, '2017-07-03 01:15:00', '2017-07-03 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(200, '1499151547373', 30, '2017-07-04 01:15:00', '2017-07-04 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(201, '1499151547373', 30, '2017-07-05 01:15:00', '2017-07-05 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(202, '1499151547373', 30, '2017-07-06 01:15:00', '2017-07-06 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(203, '1499151547373', 30, '2017-07-07 01:15:00', '2017-07-07 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(163, '1497351515979', 30, '2017-06-17 07:35:00', '2017-06-17 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(164, '1497351515979', 30, '2017-06-18 07:35:00', '2017-06-18 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(143, '1497351187181', 30, '2017-06-19 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(144, '1497351187181', 30, '2017-06-20 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(145, '1497351187181', 30, '2017-06-21 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(146, '1497351187181', 30, '2017-06-22 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(147, '1497351187181', 30, '2017-06-23 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(148, '1497351187181', 30, '2017-06-24 03:40:00', '2017-06-14 03:40:00', 'New event', 32, 8, '1497351187181', '2017-06-13 10:53:01'),
(149, '1497351285345', 30, '2017-06-14 05:50:00', '2017-06-14 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(150, '1497351285345', 30, '2017-06-15 05:50:00', '2017-06-15 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(151, '1497351285345', 30, '2017-06-16 05:50:00', '2017-06-16 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(152, '1497351285345', 30, '2017-06-17 05:50:00', '2017-06-17 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(153, '1497351285345', 30, '2017-06-18 05:50:00', '2017-06-18 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(154, '1497351285345', 30, '2017-06-19 05:50:00', '2017-06-19 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(155, '1497351285345', 30, '2017-06-20 05:50:00', '2017-06-20 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(156, '1497351285345', 30, '2017-06-21 05:50:00', '2017-06-21 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(157, '1497351285345', 30, '2017-06-22 05:50:00', '2017-06-22 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(158, '1497351285345', 30, '2017-06-23 05:50:00', '2017-06-23 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(159, '1497351285345', 30, '2017-06-24 05:50:00', '2017-06-24 05:55:00', 'New event', 32, 8, '1497351285345', '2017-06-13 10:54:27'),
(165, '1497351515979', 30, '2017-06-19 07:35:00', '2017-06-19 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(166, '1497351515979', 30, '2017-06-20 07:35:00', '2017-06-20 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(167, '1497351515979', 30, '2017-06-21 07:35:00', '2017-06-21 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(168, '1497351515979', 30, '2017-06-22 07:35:00', '2017-06-22 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(169, '1497351515979', 30, '2017-06-23 07:35:00', '2017-06-23 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(170, '1497351515979', 30, '2017-06-24 07:35:00', '2017-06-24 07:40:00', 'New event', 32, 8, '1497351515979', '2017-06-13 10:58:29'),
(171, '1497351553092', 30, '2017-06-14 09:40:00', '2017-06-14 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(172, '1497351553092', 30, '2017-06-15 09:40:00', '2017-06-15 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(173, '1497351553092', 30, '2017-06-16 09:40:00', '2017-06-16 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(174, '1497351553092', 30, '2017-06-17 09:40:00', '2017-06-17 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(175, '1497351553092', 30, '2017-06-18 09:40:00', '2017-06-18 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(176, '1497351553092', 30, '2017-06-19 09:40:00', '2017-06-19 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(177, '1497351553092', 30, '2017-06-20 09:40:00', '2017-06-20 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(178, '1497351553092', 30, '2017-06-21 09:40:00', '2017-06-21 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(179, '1497351553092', 30, '2017-06-22 09:40:00', '2017-06-22 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(180, '1497351553092', 30, '2017-06-23 09:40:00', '2017-06-23 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(181, '1497351553092', 30, '2017-06-24 09:40:00', '2017-06-24 09:45:00', 'New event', 31, 8, '1497351553092', '2017-06-13 10:58:54'),
(182, '1497351621995', 30, '2017-06-14 00:35:00', '2017-06-14 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(183, '1497351621995', 30, '2017-06-15 00:35:00', '2017-06-15 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(184, '1497351621995', 30, '2017-06-16 00:35:00', '2017-06-16 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(185, '1497351621995', 30, '2017-06-17 00:35:00', '2017-06-17 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(186, '1497351621995', 30, '2017-06-18 00:35:00', '2017-06-18 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(187, '1497351621995', 30, '2017-06-19 00:35:00', '2017-06-19 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(188, '1497351621995', 30, '2017-06-20 00:35:00', '2017-06-20 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(189, '1497351621995', 30, '2017-06-21 00:35:00', '2017-06-21 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(190, '1497351621995', 30, '2017-06-22 00:35:00', '2017-06-22 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(191, '1497351621995', 30, '2017-06-23 00:35:00', '2017-06-23 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(192, '1497351621995', 30, '2017-06-24 00:35:00', '2017-06-24 00:40:00', 'New event', 32, 8, '1497351621995', '2017-06-13 11:00:02'),
(207, '1499151547373', 30, '2017-07-11 01:15:00', '2017-07-11 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(208, '1499151547373', 30, '2017-07-12 01:15:00', '2017-07-12 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21'),
(209, '1499151547373', 30, '2017-07-13 01:15:00', '2017-07-13 01:20:00', 'New event', 32, 8, '1499151547373', '2017-07-04 06:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `au_users`
--

CREATE TABLE `au_users` (
  `id` int(11) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `password` varchar(250) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `address_1` varchar(200) NOT NULL,
  `address_2` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `company` varchar(100) NOT NULL,
  `subscriptionType` varchar(20) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `Paypal_PROFILEID` varchar(100) NOT NULL,
  `Paypal_PROFILESTATUS` varchar(100) NOT NULL,
  `Paypal_NEXTBILLINGDATE` date DEFAULT NULL,
  `Paypal_otherinformation` text NOT NULL,
  `status` int(11) NOT NULL,
  `ActiveByAdmin` int(11) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `au_users`
--

INSERT INTO `au_users` (`id`, `f_name`, `l_name`, `email`, `phone_no`, `password`, `occupation`, `address_1`, `address_2`, `city`, `state`, `country`, `zip`, `company`, `subscriptionType`, `plan_id`, `Paypal_PROFILEID`, `Paypal_PROFILESTATUS`, `Paypal_NEXTBILLINGDATE`, `Paypal_otherinformation`, `status`, `ActiveByAdmin`, `type`, `company_id`, `created`, `last_login`) VALUES
(6, 'khalid', 'hashmi', 'khalidhashmi13@gmail.com', '56325546', '202cb962ac59075b964b07152d234b70', 'job', 'lucknow', '', 'lucknow', 'up', 'india', '226010', 'Augurs', 'monthly', 2, 'I-NMVDGNL7AMBT', 'ActiveProfile', '2017-08-24', '{\"PROFILEID\":\"I-NMVDGNL7AMBT\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-06-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-05-20T10:41:32Z\",\"LASTPAYMENTAMT\":\"5.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"10.00\",\"AGGREGATEAMT\":\"10.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-05-24T11:13:33Z\",\"CORRELATIONID\":\"f20bb5e2945a0\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"5.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"5.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', 0, 1, 'company', 0, '2017-04-15 12:56:43', '2017-06-29 02:26:51'),
(10, 'khalid', 'hashmi', 'khalidhashmi133@gmail.com', '5645645', 'bc1da7879dd92a27d6f496345ffbc9cf', 'job', 'lucknow', '', 'lucknow', 'up', 'india', '226010', 'Augurs', '', 0, '', '', NULL, '', 0, 1, 'Employee', 6, '2017-04-18 09:36:59', '2017-04-18 04:36:59'),
(30, 'Augurs', 'Tech', 'company1@augurs.com', '53453453', 'e10adc3949ba59abbe56e057f20f883e', 'Software Development', 'b-97', 'gomti nagar', 'lucknow', 'up', 'india', '43432', 'Augurs', 'monthly', 2, 'I-PUJR43S9TYUD', 'ActiveProfile', '2017-08-04', '{\"PROFILEID\":\"I-PUJR43S9TYUD\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Normal Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"Augurs\",\"PROFILESTARTDATE\":\"2017-07-04T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-08-04T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"1\",\"NUMCYCLESREMAINING\":\"18446744073709551615\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-07-04T11:13:28Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"50.00\",\"AGGREGATEAMT\":\"50.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:29Z\",\"CORRELATIONID\":\"10b99ea6aa6a3\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', 1, NULL, 'company', NULL, '2017-05-06 08:29:39', '2017-07-04 02:00:46'),
(31, 'emplyee1', 'augurs', 'employee1@augurs.com', '3453423423', 'e10adc3949ba59abbe56e057f20f883e', 'Software Development', 'lucknow', 'gomti nagar', 'lucknow', 'up', 'india', '43432', 'Augurs', '', 0, '', '', NULL, '', 1, NULL, 'Employee', 30, '2017-05-06 08:35:20', '2017-05-06 03:44:25'),
(15, 'madhevendra', 'singh', 'madhvendra009@gmail.com', '545345', '202cb962ac59075b964b07152d234b70', 'job', 'lucknow', '', 'lucknow', 'up', 'india', '226010', 'Augurs', 'monthly', 1, 'I-AHAPEAK6F0WU', 'ActiveProfile', '2017-07-20', '{\"PROFILEID\":\"I-AHAPEAK6F0WU\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"madhevendra\",\"PROFILESTARTDATE\":\"2017-04-20T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-20T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"3\",\"NUMCYCLESREMAINING\":\"18446744073709551613\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-20T10:55:02Z\",\"LASTPAYMENTAMT\":\"30.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-04T06:51:28Z\",\"CORRELATIONID\":\"31040b74199c5\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"30.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"30.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', 1, NULL, 'company', NULL, '2017-04-20 10:37:43', '2017-04-20 05:46:08'),
(21, 'employe', '1', 'augurs@employee1.com', '343243', '202cb962ac59075b964b07152d234b70', 'php developer', 'gomti nagar', 'lucknow', 'lucknow', 'up', 'India', '226010', 'Augurs', '', 0, '', '', NULL, '', 0, 1, 'Employee', 17, '2017-05-05 06:25:20', '2017-05-06 02:32:38'),
(20, 'khalid', 'hashmi', 'khalidhashmi132@gmail.com', '43234', '123', 'job', 'lucknow', 'ajay nagar', 'lucknow', 'up', 'India', '226010', 'Augurs', 'monthly', 3, 'I-TBTBY1D3P0NV', 'ActiveProfile', '2017-07-03', '{\"PROFILEID\":\"I-TBTBY1D3P0NV\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"SameEveryTime\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-03T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-03T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"0.00\",\"FAILEDPAYMENTCOUNT\":\"0\",\"LASTPAYMENTDATE\":\"2017-06-03T10:39:06Z\",\"LASTPAYMENTAMT\":\"50.00\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"100.00\",\"AGGREGATEAMT\":\"100.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:30Z\",\"CORRELATIONID\":\"7eb00d8dd9179\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"Augurs Technologies\",\"SHIPTOSTREET\":\"Flat no. 507 Wing A Raheja Residency\",\"SHIPTOSTREET2\":\"Film City Road, Goregaon East\",\"SHIPTOCITY\":\"Mumbai\",\"SHIPTOSTATE\":\"Maharashtra\",\"SHIPTOZIP\":\"400097\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"50.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"50.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', 1, NULL, 'company', NULL, '2017-05-03 12:23:53', '2017-05-03 07:23:53'),
(32, 'emplyee2', 'augurs', 'employee2@augurs.com', '3453423423', 'e10adc3949ba59abbe56e057f20f883e', 'Software Development', 'lucknow', 'ajay nagar', 'lucknow', 'up', 'india', '43432', 'Augurs', '', 0, '', '', NULL, '', 1, NULL, 'Employee', 30, '2017-05-06 08:37:26', '2017-05-06 03:37:26'),
(29, 'employee', '3', 'augurs@employee3.com', '5645645', '9ddc2340c81f58fd16b7949b7a0242a6', 'job', 'lucknow', 'ajay nagar', 'lucknow', 'up', 'india', '226016', 'Augurs', '', 0, '', '', NULL, '', 0, NULL, 'Employee', 17, '2017-05-05 07:02:27', '2017-05-05 02:02:27'),
(28, 'employe', '2', 'augurs@employee2.com', '343243', 'e9ee02f0ca94163d4d1918575c73acc4', 'php developer', 'gomti nagar', 'lucknow', 'lucknow', 'up', 'India', '226010', 'Augurs', '', 0, '', '', NULL, '', 0, NULL, 'Employee', 17, '2017-05-05 06:58:19', '2017-05-05 01:58:19'),
(33, 'khalid', 'hashmi', 'company4@augurs.com', '1234567', '202cb962ac59075b964b07152d234b70', '', '', '', '', '', 'AU', '', '', 'monthly', 3, 'I-F4J1HSJCR51L', 'ActiveProfile', '2017-07-24', '{\"PROFILEID\":\"I-F4J1HSJCR51L\",\"STATUS\":\"Active\",\"AUTOBILLOUTAMT\":\"NoAutoBill\",\"DESC\":\"Big Package Subscription\",\"MAXFAILEDPAYMENTS\":\"3\",\"SUBSCRIBERNAME\":\"khalid\",\"PROFILESTARTDATE\":\"2017-05-24T07:00:00Z\",\"NEXTBILLINGDATE\":\"2017-07-24T10:00:00Z\",\"NUMCYCLESCOMPLETED\":\"2\",\"NUMCYCLESREMAINING\":\"18446744073709551614\",\"OUTSTANDINGBALANCE\":\"90.00\",\"FAILEDPAYMENTCOUNT\":\"1\",\"TRIALAMTPAID\":\"0.00\",\"REGULARAMTPAID\":\"90.00\",\"AGGREGATEAMT\":\"90.00\",\"AGGREGATEOPTIONALAMT\":\"0.00\",\"FINALPAYMENTDUEDATE\":\"1970-01-01T00:00:00Z\",\"TIMESTAMP\":\"2017-07-07T05:45:31Z\",\"CORRELATIONID\":\"bf197013e0c33\",\"ACK\":\"Success\",\"VERSION\":\"123.0\",\"BUILD\":\"29297572\",\"SHIPTONAME\":\"khalid hashmi\",\"SHIPTOSTREET\":\"gomti\",\"SHIPTOCITY\":\"lucknow\",\"SHIPTOSTATE\":\"Uttar Pradesh\",\"SHIPTOZIP\":\"226010\",\"SHIPTOCOUNTRYCODE\":\"IN\",\"SHIPTOCOUNTRY\":\"IN\",\"SHIPTOCOUNTRYNAME\":\"India\",\"SHIPADDRESSOWNER\":\"PayPal\",\"SHIPADDRESSSTATUS\":\"Unconfirmed\",\"BILLINGPERIOD\":\"Month\",\"BILLINGFREQUENCY\":\"1\",\"TOTALBILLINGCYCLES\":\"0\",\"CURRENCYCODE\":\"USD\",\"AMT\":\"90.00\",\"SHIPPINGAMT\":\"0.00\",\"TAXAMT\":\"0.00\",\"REGULARBILLINGPERIOD\":\"Month\",\"REGULARBILLINGFREQUENCY\":\"1\",\"REGULARTOTALBILLINGCYCLES\":\"0\",\"REGULARCURRENCYCODE\":\"USD\",\"REGULARAMT\":\"90.00\",\"REGULARSHIPPINGAMT\":\"0.00\",\"REGULARTAXAMT\":\"0.00\"}', 1, NULL, 'company', NULL, '2017-05-24 11:13:32', '2017-05-24 06:17:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `au_admin`
--
ALTER TABLE `au_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_company_stats`
--
ALTER TABLE `au_company_stats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_milestones`
--
ALTER TABLE `au_milestones`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_pages`
--
ALTER TABLE `au_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_paypalhistory`
--
ALTER TABLE `au_paypalhistory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_plans`
--
ALTER TABLE `au_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_tasks`
--
ALTER TABLE `au_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `au_users`
--
ALTER TABLE `au_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `au_admin`
--
ALTER TABLE `au_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `au_company_stats`
--
ALTER TABLE `au_company_stats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `au_milestones`
--
ALTER TABLE `au_milestones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `au_pages`
--
ALTER TABLE `au_pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `au_paypalhistory`
--
ALTER TABLE `au_paypalhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `au_plans`
--
ALTER TABLE `au_plans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `au_tasks`
--
ALTER TABLE `au_tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;
--
-- AUTO_INCREMENT for table `au_users`
--
ALTER TABLE `au_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
