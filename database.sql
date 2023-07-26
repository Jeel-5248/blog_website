-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: database
-- Generation Time: Jul 26, 2023 at 12:08 PM
-- Server version: 10.6.12-MariaDB-1:10.6.12+maria~ubu2004-log
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin'),
('jeel', 'shah');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blog_id` int(11) NOT NULL,
  `blog_name` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `publish_date` date NOT NULL DEFAULT current_timestamp(),
  `blog_content` text NOT NULL,
  `blog_image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blog_id`, `blog_name`, `blog_title`, `category`, `publish_date`, `blog_content`, `blog_image`) VALUES
(2, 'Blog related Lifestyle', ' A Cup of Jo', '4', '2023-05-27', '<h3 id=\"h-6-a-cup-of-jo\">&nbsp;<a href=\"https://cupofjo.com/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" data-wpel-link=\"external\">A Cup of Jo</a></h3>\r\n<h3 id=\"h-6-a-cup-of-jo\"></h3>\r\n<figure><a href=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage.png\" rel=\"follow\" data-wpel-link=\"internal\"><img style=\"height: auto;\" title=\"The A Cup of Jo website homepage\" src=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage-1024x570.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage.png 1024w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage-300x167.png 300w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage-150x84.png 150w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/a-cup-of-jo-website-homepage-768x428.png 768w\" alt=\"The A Cup of Jo blog homepage.\" width=\"1024\" height=\"570\"></a></figure>\r\n<ul>\r\n<li style=\"list-style-type: inherit;\"><strong>Main topics:&nbsp;</strong>fashion, food, travel, relationships, family life</li>\r\n<li style=\"list-style-type: inherit;\"><strong>Created on:&nbsp;</strong>WordPress</li>\r\n</ul>\r\n<p>Joanna Goddard, an experienced editor, started writing about her daily life as a hobby. Later, blogging turned out to be her full-time job.</p>\r\n<p>The blog is now run by a team of writers who provide a wide array of content &ndash; from food recipes to parenting tips.</p>\r\n<p><strong>What Can We Learn From This Blog</strong></p>\r\n<p>The website sports a warm-toned theme, with plenty of space between the site elements.</p>\r\n<p>In addition to the blog&rsquo;s clever title that is a play on the phrase &ldquo;a cup of joe&rdquo;, the title&rsquo;s design is also unique. The letter O of the word &ldquo;of&rdquo; in &ldquo;A Cup of Jo&rdquo; is hollowed out to reveal a picture that changes depending on which page of the blog you&rsquo;re on.</p>\r\n<p>The homepage also features a list of the most popular blog posts of the month &ndash; an excellent way to promote the blog to new readers by providing them easy access to the blog&rsquo;s best content of the month.</p>', 'a-cup-of-jo-website-homepage.png'),
(4, 'Women\'s Fashion', 'Sincerely Jules', '6', '2023-05-22', '<h3 id=\"h-13-sincerely-jules\"><a href=\"https://sincerelyjules.com/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" data-wpel-link=\"external\">Sincerely Jules</a></h3>\r\n<figure><a href=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage.png\" rel=\"follow\" data-wpel-link=\"internal\"><img style=\"height: auto;\" title=\"The Sincerely Jules website homepage\" src=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage-1024x497.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage.png 1024w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage-300x146.png 300w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage-150x73.png 150w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/sincerely-jules-website-homepage-768x373.png 768w\" alt=\"The Sincerely Jules website homepage.\" width=\"1024\" height=\"497\"></a></figure>\r\n<ul>\r\n<li style=\"list-style-type: inherit;\"><strong>Main topics:&nbsp;</strong>women&rsquo;s fashion, beauty, lifestyle</li>\r\n<li style=\"list-style-type: inherit;\"><strong>Created on:&nbsp;</strong>WordPress</li>\r\n</ul>\r\n<p>Founded as a creative outlet by beauty and fashion blogger Julie Sari&ntilde;ana, Sincerely Jules is a blog that provides outfit ideas, beauty tips, and reviews of her favorite products.</p>\r\n<p>The blog provides diverse fashion content, including articles on fashion ideas for various occasions, such as going on vacation, to the beach, jogging, or staying home.</p>\r\n<p><strong>What Can We Learn From This Blog</strong></p>\r\n<p>The first thing visitors see when visiting the blog is a high-quality, full-screen picture accompanying the title of its latest article. It gives the blog a spotless and pleasing look.</p>\r\n<p>In addition to the site&rsquo;s clean layout, the blog includes helpful sliders to go with the outfit ideas.</p>\r\n<p>The sliders feature the blogger&rsquo;s outfit in the pictures. Clicking on a piece of clothing will lead to an online shop where you can purchase the item in question.</p>', 'sincerely-jules-website-homepage.png'),
(5, 'Fitness', ' Muscle and Fitness', '4', '2023-05-22', '<h3 id=\"h-17-muscle-and-fitness\">&nbsp;<a href=\"https://www.muscleandfitness.com/\" target=\"_blank\" rel=\"nofollow noopener noreferrer\" data-wpel-link=\"external\">Muscle and Fitness</a></h3>\r\n<figure><a href=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage.png\" rel=\"follow\" data-wpel-link=\"internal\"><img style=\"height: auto;\" title=\"The Muscle and Fitness Website homepage\" src=\"https://www.hostinger.in/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage-1024x437.png\" sizes=\"(max-width: 1024px) 100vw, 1024px\" srcset=\"https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage.png 1024w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage-300x128.png 300w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage-150x64.png 150w, https://www.hostinger.com/tutorials/wp-content/uploads/sites/2/2021/12/muscle-and-fitness-website-homepage-768x328.png 768w\" alt=\"The Muscle and Fitness Website homepage.\" width=\"1024\" height=\"437\"></a></figure>\r\n<ul>\r\n<li style=\"list-style-type: inherit;\"><strong>Main topics:&nbsp;</strong>workout, fitness, nutrition, athletes, and celebrities</li>\r\n<li style=\"list-style-type: inherit;\"><strong>Created on:&nbsp;</strong>WordPress</li>\r\n</ul>\r\n<p>Muscle and Fitness blog provides diverse content centered around fitness and healthy living, from workout routines and nutritional eating guides to exercise tips from various athletes and celebrities.</p>\r\n<p><strong>What We Can Learn from This Blog</strong></p>\r\n<p>Visitors can use a comprehensive filter to find the right kind of exercise video from over 1,000 exercises on the homepage.</p>\r\n<p>The filter features four drop-down menus from which users can select their&nbsp;<strong>Skill Level</strong>,&nbsp;<strong>Exercise Type</strong>,&nbsp;<strong>Body Part</strong>, and&nbsp;<strong>Equipment</strong>. This makes it easy to create workout routines that fit your needs.</p>', 'muscle-and-fitness-website-homepage.png'),
(6, 'Food Recipies', 'Budget Bytes', '2', '2023-05-22', '<h2><strong>Budget Bytes</strong></h2>\r\n<p><img style=\"height: auto;\" src=\"https://influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp\" sizes=\"800px\" srcset=\"//influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp 800w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-300x134.jpg.webp 300w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-768x342.jpg.webp 768w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-150x67.jpg.webp 150w\" alt=\"Budget Bytes provide delicious recipes designed for small budget\" width=\"800\" height=\"356\" data-srcset-webp=\"//influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp 800w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-300x134.jpg.webp 300w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-768x342.jpg.webp 768w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-150x67.jpg.webp 150w\" data-src-webp=\"//influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp\" data-sizes=\"auto\" data-srcset=\"//influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp 800w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-300x134.jpg.webp 300w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-768x342.jpg.webp 768w, //influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10.-150x67.jpg.webp 150w\" data-src=\"//influencermarketinghub.com/wp-content/uploads/2018/06/Home-Budget-Bytes-Google-Chrome-2022-12-21-10..jpg.webp\"></p>\r\n<p>Website:<a href=\"https://www.budgetbytes.com/\" target=\"_blank\" rel=\"noopener\">&nbsp;budgetbytes.com</a></p>\r\n<p>Budget Bytes aims to provide delicious recipes designed for small budgets. It recognizes that we can&rsquo;t all afford to use expensive ingredients and cook recipes that take hours to prepare. It tries to cater to those with &ldquo;Instagram taste and a peanut butter budget.&rdquo;</p>\r\n<p>Budget Bytes is the creation of Beth Moncel. She wants to help people shop, cook, and eat smart. She provides numerous recipes on her blog, along with their cost analysis, preparation time, alternative preparations, and step-by-step photos of each recipe.</p>\r\n<p>Beth has developed six principles to keep her grocery budget low and reduce waste:</p>\r\n<ol style=\"list-style-type: decimal;\">\r\n<li>Plan your meals</li>\r\n<li>Use ingredients wisely</li>\r\n<li>Portion control</li>\r\n<li>Don\'t be afraid of leftovers</li>\r\n<li>The freezer is your friend</li>\r\n<li>Shop wisely</li>\r\n</ol>\r\n<hr>\r\n<p><a id=\"toc-6\" name=\"toc-6\"></a></p>', 'download.jpeg'),
(7, 'Paris Plan', '5 DAYS IN PARIS', '3', '2023-05-22', '<header>\r\n<h1>HOW TO SPEND 5 DAYS IN PARIS</h1>\r\n</header>\r\n<div>\r\n<p><img style=\"height: auto;\" src=\"https://www.nomadicmatt.com/wp-content/uploads/2018/08/5daysinparis1.jpg\" sizes=\"(max-width: 675px) 100vw, 675px\" srcset=\"https://www.nomadicmatt.com/wp-content/uploads/2018/08/5daysinparis1.jpg 675w, https://www.nomadicmatt.com/wp-content/uploads/2018/08/5daysinparis1-300x176.jpg 300w, https://www.nomadicmatt.com/wp-content/uploads/2018/08/5daysinparis1-600x351.jpg 600w, https://www.nomadicmatt.com/wp-content/uploads/2018/08/5daysinparis1-400x234.jpg 400w\" alt=\"The Eiffel Tower in Paris, France on a clear summer day\" width=\"675\" height=\"395\"><br><strong>Last Updated</strong>: 5/13/23 | May 13th, 2023</p>\r\n<p><a href=\"https://www.nomadicmatt.com/travel-guides/france-travel-tips/paris/\" target=\"_blank\" rel=\"noopener noreferrer\">Paris</a>. It&rsquo;s one of my favorite destinations in the entire world and a city that would take a lifetime to see.</p>\r\n<p>I&rsquo;ve been to the city more times than I remember &mdash;&nbsp;<a href=\"https://www.nomadicmatt.com/travel-blogs/life-in-paris/\" target=\"_blank\" rel=\"noopener noreferrer\">I even moved there for a while</a>&nbsp;&mdash; yet I&rsquo;ve barely scratched its surface.</p>\r\n<p>Understandably, planning a trip to Paris is hard. Just when you think you&rsquo;ve seen everything the city has to offer, you find new attractions, new caf&eacute;s, or new markets to explore (not to mention visiting&nbsp;<a href=\"https://www.getyourguide.com/paris-l16/disneyland-paris-2-parks-ticket-1-2-3-4-5-day-t395320/?partner_id=LLKQJ38&amp;utm_medium=online_publisher&amp;cmp=Disneylandpariscampaign-nomadicmatt&amp;__ATTRACTION_DISNEYLAND-PARIS__EU_CREATIVE_tc-nomadicmatt-article&amp;deeplink_id=2e366103-d297-5424-97ed-1f7677fd21c5\" target=\"_blank\" rel=\"noopener\" data-gyg-scraped=\"1684753331126\" aria-invalid=\"true\">Disneyland Paris</a>). There are layers to this city &mdash; which is partially why I love it so much.</p>\r\n<p>Most travelers seem to visit Paris for around three days before moving on. They see the highlights, snap some photos, and move on.</p>\r\n<p>While three days is better than nothing, I think you need more time than that. Ideally, I think you should plan on spending at least five days in Paris in order to see the bare minimum of what the City of Lights has to offer. There&rsquo;s just too much to do.</p>\r\n<p>To help you plan your trip to Paris and figure out what to see, what to do, where to stay, and where to eat, here&rsquo;s my suggested itinerary for a five-day visit (and some other suggestions in case you decide to spend longer there!)</p>\r\n</div>', 'fivedaysparis1b.jpg'),
(8, 'Photograpy ', ' PhotographyCourse.net', '7', '2023-05-22', '<h4>&nbsp;<a href=\"https://photographycourse.net/photography-articles/\">PhotographyCourse.net</a></h4>\r\n<p>PhotographyCourse offers hundreds of&nbsp;<a href=\"https://photographycourse.net/photography-articles/\">educational articles on various photography topics</a>. Run by a team of passionate photographers, this blog has everything you need to improve your skills. From unique business tricks to professional photographer interviews, you&rsquo;ll find a wide variety of content on their blog.</p>\r\n<figure><img style=\"height: auto;\" src=\"https://dvyvvujm9h0uq.cloudfront.net/com/articles/1663658097-376164-photography-course2jpg.png\" alt=\"PhotographyCourse.net - photography blogs\" data-src=\"https://dvyvvujm9h0uq.cloudfront.net/com/articles/1663658097-376164-photography-course2jpg.png\" data-image=\"rmz44tpo4r94\"></figure>', '1539587823-817070-captureepng.jpg'),
(9, 'tech world', ' Recode', '1', '2023-05-23', '<h3 id=\"bbk-p0anf\"><strong>&nbsp;<a href=\"https://www.vox.com/recode\" target=\"_blank\" rel=\"nofollow noopener\">Recode</a></strong></h3>\r\n<ul style=\"list-style-type: disc;\">\r\n<li><strong>Founder:&nbsp;</strong>Kara Swisher</li>\r\n<li><strong>Year Started:&nbsp;</strong>2014</li>\r\n<li><strong>Domain Authority:</strong>&nbsp;93</li>\r\n</ul>\r\n<p><img style=\"height: auto;\" src=\"https://blog.bit.ai/wp-content/uploads/2020/09/screenshot-www.vox_.com-2020.09.08-10_49_54.jpg\" sizes=\"(max-width: 848px) 100vw, 848px\" srcset=\"https://blog.bit.ai/wp-content/uploads/2020/09/screenshot-www.vox_.com-2020.09.08-10_49_54.jpg 848w, https://blog.bit.ai/wp-content/uploads/2020/09/screenshot-www.vox_.com-2020.09.08-10_49_54-300x119.jpg 300w, https://blog.bit.ai/wp-content/uploads/2020/09/screenshot-www.vox_.com-2020.09.08-10_49_54-768x305.jpg 768w, https://blog.bit.ai/wp-content/uploads/2020/09/screenshot-www.vox_.com-2020.09.08-10_49_54-585x232.jpg 585w\" alt=\"Recode: Technology blog\" width=\"848\" height=\"337\"></p>\r\n<p>Currently, owned by VOX media, Recode gives the most updated&nbsp;<strong>independent technology news</strong>, analysis trends, and reviews from the most respected and informed journalists as well as bloggers in media and technology.</p>\r\n<p><strong>Recode</strong>&nbsp;is uncovering and explaining how our tech world is changing by focusing on the businesses of Silicon Valley.</p>\r\n<p>Its founder Kara Swisher has all the connections to the latest&nbsp;tech tips and products, making it a robust technology blog to read!</p>', 'screenshot-www.vox_.com-2020.09.08-10_49_54.jpg'),
(11, 'Education', 'Edutech', '1', '2023-05-23', '<p>&nbsp;</p>\r\n<div role=\"heading\">\r\n<div>&nbsp;</div>\r\n</div>\r\n<section>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<section id=\"block-views-block-blog-title-area-block-1\">\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<h1>How do you educate to decode the unknown?</h1>\r\n</div>\r\n<ul>\r\n<li><a href=\"https://blogs.worldbank.org/team/cristobal-cobo\" hreflang=\"en\">CRIST&Oacute;BAL COBO</a></li>\r\n</ul>\r\n|<time datetime=\"2019-10-17T12:00:00Z\">OCTOBER 17, 2019</time></div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n<section id=\"block-views-block-also-available-in-block-1-2\">\r\n<h2>This page in:</h2>\r\n&nbsp;\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<ul style=\"list-style-type: none;\">\r\n<li style=\"list-style-type: none;\">\r\n<div><a href=\"https://blogs.worldbank.org/edutech/how-do-you-educate-decode-unknown\" hreflang=\"en\">English</a></div>\r\n</li>\r\n<li style=\"list-style-type: none;\">\r\n<div><a href=\"https://blogs.worldbank.org/es/voices/como-se-educa-para-descifrar-lo-desconocido\" hreflang=\"es\">Espa&ntilde;ol</a></div>\r\n</li>\r\n<li style=\"list-style-type: none;\">\r\n<div><a href=\"https://blogs.worldbank.org/zh-hans/voice/how-do-you-educate-decode-unknown\" hreflang=\"zh-hans\">中文</a></div>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<a id=\"main-content\"></a>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div id=\"f03v1-social-sharing\">\r\n<div>\r\n<div><a id=\"wbgmailto\" href=\"mailto:?body=https%3A%2F%2Fblogs.worldbank.org%2Fedutech%2Fhow-do-you-educate-decode-unknown%3Fcid%3DSHR_BlogSiteEmail_EN_EXT&amp;subject=How%20do%20you%20educate%20to%20decode%20the%20unknown%3F\" data-text=\"Email\" data-customlink=\"sw:left icons\"></a><a id=\"wbgfb\" href=\"https://blogs.worldbank.org/edutech/how-do-you-educate-decode-unknown\" data-text=\"Facebook\" data-customlink=\"sw:left icons\"></a><a id=\"wbgtwt\" href=\"https://blogs.worldbank.org/edutech/how-do-you-educate-decode-unknown\" data-text=\"Tweet\" data-customlink=\"sw:left icons\"></a><a id=\"wbgld\" href=\"https://blogs.worldbank.org/edutech/how-do-you-educate-decode-unknown\" data-text=\"Linkedin\" data-customlink=\"sw:left icons\"></a><a id=\"wbcomments\" href=\"https://blogs.worldbank.org/edutech/how-do-you-educate-decode-unknown#comments\" data-text=\"Comment\" data-customlink=\"sw:left icons\">3</a></div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<figure>\r\n<div>\r\n<div>Image</div>\r\n<div><img style=\"height: auto;\" title=\"decoding\" src=\"https://blogs.worldbank.org/sites/default/files/styles/hero/public/blogs-images/2019-10/decode-cobo-blog.jpg.webp\" alt=\"decoding\" width=\"1140\" height=\"500\" loading=\"lazy\" data-src=\"/sites/default/files/styles/hero/public/blogs-images/2019-10/decode-cobo-blog.jpg.webp\"></div>\r\n</div>\r\n<figcaption>decoding</figcaption>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</figure>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>&nbsp;</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<div>\r\n<p>Picture yourself in 1989, right before the creation of the World Wide Web. Imagine that you knew, before anyone else, the impact that the Internet was going to have. What skills would you say were the most important to teach to the &lsquo;new generation&rsquo;? This is not an easy question to answer. In many cases, what we saw between the mid-1990s and 2000s was that education systems focused on helping students learn how to use specific technology tools, and not on how to thrive in a society being re-shaped by the Internet.</p>\r\n<p>Now let&rsquo;s get &ldquo;back to the future&rdquo; and jump ahead to where we find ourselves today.&nbsp;</p>\r\n<p>Image that you know before anybody else how artificial intelligence (AI) and data-intensive digital services will shape the next decade. What skills would you say are the most important to teach to the generation of learners currently in school? This is also not an easy question to answer. In many cases, education systems still focus primarily on helping learners learn to use specific technology tools.&nbsp;<em>Perhaps this time we can do better.</em></p>\r\n<p>There are a large number of approaches today on&nbsp;<a href=\"https://unesdoc.unesco.org/ark:/48223/pf0000265403\">how to develop digital skills</a>. Depending on the framework adopted, digital skills might or might not be included in so-called &lsquo;<a href=\"https://www.gov.uk/dfid-research-outputs/21st-century-skills-evidence-of-issues-in-definition-demand-and-delivery-for-development-contexts\">21st-century skills</a>&rsquo;. Most of the literature highlights the relevance of these capacities for the world that is coming (in some case for a world that is already here). There is not a single framework to use as an unequivocal reference (although&nbsp;<a href=\"https://ec.europa.eu/jrc/en/publication/eur-scientific-and-technical-research-reports/digcomp-21-digital-competence-framework-citizens-eight-proficiency-levels-and-examples-use\">some</a>&nbsp;have more visibility than others): Different countries/regions have decided to&nbsp;<a href=\"https://icdl.org/\">assess</a>&nbsp;and&nbsp;<a href=\"https://www.iea.nl/studies/iea/icils\">measure</a>&nbsp;these skills using different techniques and approaches.</p>\r\n<p>Perhaps one of the differences between 1989 and 2019 is that societies today are more aware of the influence of digital technologies in almost every aspect of our lives. Considering that our current use of technologies has become more sophisticated, it is reasonable to expect that related skills and knowledge required are more complex. As we will see, this complexity is not associated with how difficult it is to interact with certain tools (simplicity in technology is the golden rule) but rather with the capacities of thinking critically and assessing contexts.</p>\r\n<p>The current expansion of so-called &ldquo;smart technologies&rdquo; (adaptive, predictive, personalized) might make our lives easier in some cases (e.g.&nbsp;<a href=\"https://arxiv.org/pdf/1909.02809\" aria-invalid=\"true\">assistive chatbots</a>&nbsp;or&nbsp;<a href=\"https://theconversation.com/how-robots-could-help-bridge-the-elder-care-gap-82125\">robotic caregivers</a>). But it is also true that we are now much more aware of some of the unintended (in some cases negative) consequences of these new technologies than we were in the recent past.</p>\r\n<p>Some people might feel uncomfortable thinking that AI or&nbsp;<a href=\"https://www.brookings.edu/blog/education-plus-development/2018/11/16/the-robots-are-coming-to-school-now-what/\">robots</a>&nbsp;can be part of the current conversation in education. What is unknown tends to produce fear -- or rejection. On the other hand, perhaps is time to think about how to better prepare the next generation to thrive in contexts where data-intensive systems might assist or replace a number of skills and capacities currently developed in schools.</p>\r\n<p>Learning how to interact (understand, use, collaborate, behave, trust, feel) with robots might not be sci-fi&nbsp;<a href=\"https://www.wsj.com/articles/why-kids-should-call-the-robot-it-11566811801\">anymore</a>. Joseph Aoun, the author of&nbsp;<a href=\"https://mitpress.mit.edu/books/robot-proof\"><em>Robot-Proof</em></a>, suggests that reading, writing and mathematics form baseline capabilities for modern society. But now there are additional challenges. In addition, at least three more literacies are needed:&nbsp;<em>data literacy</em>&nbsp;(to read, analyze and use an ever-rising tide of information);&nbsp;<em>technological literacy</em>&nbsp;(including coding and understanding how machines tick); and&nbsp;<em>human literacy</em>&nbsp;(understanding how to function in the human milieu).</p>\r\n<p>Before taking a strong position on what role can AI play in education, it might be a good idea to remember that humans have all sorts of intelligence and capacities that go far beyond what narrow AI can do today.&nbsp;<a href=\"https://parliamentlive.tv/Event/Index/a7535703-96ae-4c7f-a6f6-c10f15dce07e\">Rosemary Luckin</a>&nbsp;emphasizes that human intelligence is immensely rich and varied. When considering social intelligence, emotional intelligence and self-efficacy, Professor Luckin contends that one potential role for AI in education is to provide opportunities for human intelligence augmentation, with AI supporting decision‐making processes, rather than&nbsp;<a href=\"https://onlinelibrary.wiley.com/doi/abs/10.1111/bjet.12829\" aria-invalid=\"true\">replacing people through automation</a>.&nbsp;</p>\r\n<p>Neil Selwyn, a professor of education at Victoria\'s Monash University and the author of a new book,&nbsp;<em>Should Robots Replace Teachers?</em>,&nbsp;<a href=\"https://www.smh.com.au/education/software-never-has-a-day-off-sick-fears-teachers-could-be-replaced-by-robots-20190905-p52ocn.html\">suggests that</a>&nbsp;&ldquo;the worry is not that teachers are going to be replaced but that they\'re going to be displaced or de-professionalized.\" Others prefer to go further, suggesting that&nbsp;<a href=\"https://www.nytimes.com/2017/01/12/technology/robots-will-take-jobs-but-not-as-fast-as-some-fear-new-report-says.html\">AI will replace jobs or whole sections of the workforce</a>. Whatever the case, research shows that educators might need support and guidance to adopt and teach this new knowledge and languages, and that their role during the learning experience of students&nbsp;<a href=\"https://onlinelibrary.wiley.com/doi/full/10.1111/bjet.12355\" aria-invalid=\"true\">remains fundamental</a>.</p>\r\n<p>Which would you rather be: the passenger or the driver?</p>\r\n<p>The expansion of policies promoting the development of computational thinking capacities is something that has gained visibility and relevance. Countries like the UK have decided to&nbsp;<a href=\"https://www.computingatschool.org.uk/data/uploads/CASPrimaryComputing.pdf\" aria-invalid=\"true\">adopt computational thinking</a>&nbsp;as a central component of their national curriculum. Today is possible to find a growing number of&nbsp;<a href=\"https://ec.europa.eu/jrc/en/computational-thinking\">countries</a>&nbsp;(and civil society&nbsp;<a href=\"https://code.org/\">initiatives</a>) promoting not only learning how to use technologies, but also&nbsp;<a href=\"https://creativecomputing.gse.harvard.edu/\">how to create new ones</a>. Perhaps one of the most interesting questions in this context has to do with whether to teach&nbsp;<a href=\"https://www.codecademy.com/\">computational thinking</a>&nbsp;as a subject, or to incorporate it in different disciplines, integrated as a &ldquo;transversal literacy&rdquo;. Both approaches have pros and cons; it is quite likely that this will continue to be an ongoing conversation.</p>\r\n<p>Those who promote computational thinking emphasize that it&rsquo;s not about coding but about understanding -- not from the passenger seat,&nbsp;<em>but as a driver</em>&nbsp;-- how the technology works and its implications in today&rsquo;s society. As&nbsp;<a href=\"https://oecdedutoday.com/computer-science-and-pisa-2021/\">recently announced by the OECD</a>, the 2021 PISA assessment will incorporate aspects of computational thinking for the first time. The emphasis will be on processes and mental models (e.g. abstraction, algorithmic thinking, automation, decomposition and generalization) that learners need to succeed in an increasingly technological world.</p>\r\n<p>Interestingly, the more social the experience of using technologies becomes, the closer the connection between digital skills and the so-called&nbsp;<a href=\"https://www.worldbank.org/en/topic/skillsdevelopment\">social-emotional skills</a>.&nbsp;<em>As important as learning to code might be, it also will be important to learn how to decode.</em>&nbsp;Identifying new problems can lead us to change the way we see today&rsquo;s skills. Here some examples of transversal competencies which illustrates&nbsp;<a href=\"https://www.commonsense.org/education/digital-citizenship\">socio-technical capacities</a>&nbsp;that might be useful to consider:</p>\r\n<ul>\r\n<li><strong>Algorithmic thinking</strong>: To what extent might the information presented by algorithms &nbsp;influence ideas, feelings or decisions? How, when, and to what end might automated systems impact people&rsquo;s lives? How to understand the potential cost of automated decisions? How to develop algorithm awareness to deal with potential bias?</li>\r\n<li><strong>Smart skepticism</strong>: How to develop a selective trust to deal with&nbsp;<a href=\"https://www.ted.com/talks/danielle_citron_how_deepfakes_undermine_truth_and_threaten_democracy\">deepfakes</a>&nbsp;or&nbsp;<a href=\"https://www.ted.com/talks/olga_yurkova_inside_the_fight_against_russia_s_fake_news_empire\">fake news</a>? What techniques, protocols or good practices can help us selecting reliable information? How to administrate trust in data-intensive environments? How to promote independent thinking, demanding evidence or even thinking scientifically with some&nbsp;<a href=\"https://www.ted.com/talks/andrew_marantz_inside_the_bizarre_world_of_internet_trolls_and_propagandists/transcript\">doses of skepticism</a>?&nbsp;</li>\r\n<li><strong>Ethical fluency</strong>: How to infuse ethical thinking into the design, deployment, and adoption of information technologies? How to incorporate&nbsp;<a href=\"https://www.nesta.org.uk/blog/ai-ethics-and-limits-codes/\">privacy and data protection</a>&nbsp;in every stage of technology adoption? How to transition from the motto, &ldquo;move fast and break things&rdquo;, towards work that benefits of your community but does not negatively &nbsp;affect others?</li>\r\n<li><strong>Self-regulation</strong>: In contexts of over-stimulation and hyper-connection, how to self-regulate one\'s behavior, emotions, and thoughts in different digital environments, especially when they might affect others (or yourself)? What are the best strategies for maintaining online attentional focus?</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</section>', 'decode-cobo-blog.jpg.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(2, 'Food'),
(3, 'Travel'),
(4, 'Health'),
(5, 'Lifestyle'),
(6, 'Fashion'),
(7, 'Photography'),
(12, 'Hospitality');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `age` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `age`) VALUES
(5, 'user', 'user', 'user@123', 'user', 'M', 21),
(2, 'jeel', 'shah', 'shahjeel9202@gmail.com', '1234', 'F', 21),
(3, 'jeel', 'shah', 'shahjeel9202@gmail.com1234', '1234', 'F', 21),
(14, 'abcd', '', '', '', 'F', 0),
(9, 'jeel', 'shah', 'shah@gmail.com', '1234', 'F', 21),
(12, 'jeel', 'shah', 'shahjeel9202@gmail.com12335457', 'Shahjeel@1234', 'F', 21);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
