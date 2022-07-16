-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 16, 2022 at 10:52 AM
-- Server version: 8.0.29
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcbuilderbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `categories` varchar(255) NOT NULL,
  `status` tinyint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories`, `status`) VALUES
(1, 'CPU', 1),
(2, 'Mobo', 1),
(4, 'PSU', 1),
(5, 'GPU', 1),
(7, 'RAM', 1),
(8, 'Storage', 1),
(10, 'Case', 1),
(11, 'PreBuilt', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(75) NOT NULL,
  `mobile_num` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `comment` text NOT NULL,
  `added_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `mobile_num`, `comment`, `added_on`) VALUES
(1, 'Alexander Cebreiros', 'alexanderjames_cebreiros@gmail.com', '09081631892', 'Test Query', '2022-07-03'),
(12, 'kurt', 'abc', '123', '123', '2022-07-09'),
(13, 'Kurt', 'abd@123.com', '09123456789', 'Hello', '2022-07-10');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `qty`, `price`) VALUES
(3, 4, 13, 3, 9000),
(4, 5, 13, 3, 9000),
(5, 6, 13, 3, 9000),
(6, 7, 9, 2, 9000),
(7, 7, 11, 2, 79000),
(8, 7, 10, 2, 75000),
(9, 7, 12, 2, 790000),
(10, 8, 13, 2, 9000),
(11, 8, 14, 5, 9000);

-- --------------------------------------------------------

--
-- Table structure for table `order_status`
--

CREATE TABLE `order_status` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `order_status`
--

INSERT INTO `order_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Canceled'),
(5, 'Complete');

-- --------------------------------------------------------

--
-- Table structure for table `payment_status`
--

CREATE TABLE `payment_status` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `payment_status`
--

INSERT INTO `payment_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Success');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `categories_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `mrp` float NOT NULL,
  `product_price` float NOT NULL,
  `product_quantity` int NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_short_desc` varchar(2000) NOT NULL,
  `product_desc` text NOT NULL,
  `meta_title` varchar(2000) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `meta_desc` varchar(2000) NOT NULL,
  `meta_keyword` varchar(2000) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `categories_id`, `product_name`, `mrp`, `product_price`, `product_quantity`, `product_image`, `product_short_desc`, `product_desc`, `meta_title`, `meta_desc`, `meta_keyword`, `status`) VALUES
(17, 1, 'Intel Core i3-12100U', 10000, 9500, 5, '627025790_i3-12100u.png', '12M Cache, up to 4.30 GHz', 'The Core i3-12100 comes with a 60W PBP (base) and 89W MTP (peak) power rating. The chip clocks in with a 3.3 GHz base and boosts up to 4.3 GHz. It also comes with 12 MB of L3 cache. The Core i3-12100 is a locked chip, meaning it isn\'t overclockable.', '', '', 'CPU-LE01', 1),
(20, 1, 'Ryzen 3 2200G', 6000, 5500, 5, '367276610_ryzen3-2200g.png', 'The Unlocked, Quad-Core Processor with Best-in-Class eSports Gaming', 'Ryzen 3 2200G is a 64-bit quad-core low-end performance x86 desktop microprocessor introduced by AMD in early 2018. This processor is based on AMD\'s Zen microarchitecture and is fabricated on a 14 nm process. The 2200G operates at a base frequency of 3.5 GHz with a TDP of 65 W and a Boost frequency of 3.7 GHz.', '', '', 'CPU-LE02', 1),
(21, 1, 'Intel Core i5-12400', 12000, 11500, 5, '162664050_i5-12400.png', '18M Cache, up to 4.40 GHz', 'Core i5-12400 has 18MB of L3 cache and operates at 2.5 GHz by default, but can boost up to 4.4 GHz, depending on the workload. Intel is building the Core i5-12400 on a 10 nm production process, the transistor count is unknown. The multiplier is locked on Core i5-12400, which limits its overclocking capabilities.', '', '', '', 1),
(22, 1, 'Athlon 240GE', 4200, 3930, 5, '863870696_athlon-240ge.png', 'with Radeon™ Vega 3 Graphics', 'Athlon 240GE is a 64-bit dual-core low-end performance x86 desktop microprocessor introduced by AMD in late 2018. This processor is based on AMD\'s Zen microarchitecture and is fabricated on a 14 nm process. The 240GE operates at a base frequency of 3.5 GHz with a TDP of 35 W.', '', '', 'CPU-LE04', 1),
(23, 1, 'Ryzen 3 3300X', 7500, 7200, 5, '612709797_ryzen3-3300x.png', 'Do more. And do it faster.', 'Designed for high-performance gaming and multitasking, the Ryzen 3 3300X Quad-Core AM4 Processor from AMD has a base clock speed of 3.8 GHz, a maximum turbo frequency of 4.3 GHz, and supports PCIe 4.0 bandwidth. Additionally, this processor features four cores with eight threads in an AM4 socket with 16MB of L3 cache memory.', '', '', 'CPU-LE05', 1),
(24, 2, 'ASRock H610M-HDV', 5000, 4800, 5, '583820557_h610m-hdv.png', 'Super Alloy Motherboard', 'H610M-HDV<br> Supports 12th Gen Intel® Core™ Processors (LGA1700)<br> 5 Phase Power Design<br> Supports DDR4 3200MHz<br> 1 PCIe 4.0 x16, 1 PCIe 3.0 x1<br> Graphics Output Options: HDMI, DisplayPort, D-Sub<br> Realtek ALC887/897 7.1 CH HD Audio Codec<br> 4 SATA3<br> 4 USB 3.2 Gen1 (2 Rear, 2 Front)<br> 6 USB 2.0 (4 Rear, 2 Front)<br> Realtek Gigabit LAN', '', '', '', 1),
(25, 2, 'ASRock B660M-HDV', 8000, 7800, 5, '615486732_b660m-hdv.png', 'Digi-Power', 'B660M-HDV<br> Supports 12th Gen Intel&reg; Core&trade; Processors (LGA1700)<br> 6 Phase Power Design<br> Supports DDR4 5066MHz (OC)<br> 1 PCIe 4.0 x16, 2 PCIe 3.0 x1<br> 1 M.2 Key-E for WiFi<br> Graphics Output Options: HDMI, DisplayPort, D-Sub<br> Realtek ALC887/897 7.1 CH HD Audio Codec, Nahimic Audio<br> 4 SATA3<br> 1 Hyper M.2 (PCIe Gen4 x4)<br> 1 Ultra M.2 (PCIe Gen3 x4 &amp; SATA3)<br> 6 USB 3.2 Gen1 (3 Rear, 1 Rear Type-C, 2 Front)<br> 5 USB 2.0 (2 Rear, 3 Front)<br> Intel&reg; Gigabit LAN', '', '', 'MOBO-LE02', 1),
(26, 2, 'MSI A320M-A PRO MAX', 3000, 2600, 5, '378177594_MSI-A320M-A-PRO-MAX.png', 'Stronger than Steel', 'AMD AM4 motherboard inspired from architectural design, with Core Boost, DDR4 Boost, Turbo M.2, USB 3.2 Gen1<br> Supports 1st, 2nd and 3rd Gen AMD Ryzen&trade; / Ryzen&trade; with Radeon&trade; Vega Graphics and 2nd Gen AMD Ryzen&trade; with Radeon&trade; Graphics / Athlon&trade; with Radeon&trade; Vega Graphics and A-series / Athlon X4 Desktop Processors for Socket AM4<br> Supports DDR4 Memory, up to 3200 (OC) MHz<br> Turbo M.2: Running at PCI-E Gen3 x4 maximizes performance for NVMe based SSDs.<br> Audio Boost: Reward your ears with studio grade sound quality.<br> X-Boost: Software that auto-detects and allows you to boost the performance of any storage or USB device.<br> Core Boost: With premium layout and fully digital power design to support more cores and provide better performance.', '', '', 'MOBO-LE03', 1),
(27, 2, 'MSI B450M-A PRO MAX', 4600, 4300, 5, '219694506_MSI-B450M-A-PRO-MAX.png', 'Unbreakable to the MAX', 'AMD AM4 motherboard inspired from architectural design, with Core Boost, DDR4 Boost, Turbo M.2, USB 3.2 Gen1<br> Supports 1st, 2nd and 3rd Gen AMD&reg; Ryzen&trade; / Ryzen&trade; with Radeon&trade; Vega Graphics and 2nd Gen AMD&reg; Ryzen&trade;with Radeon&trade; Graphics / Athlon&trade; with Radeon&trade; Vega Graphics and A-series / Athlon&trade; X4 Desktop Processors for Socket AM4<br> Supports DDR4 Memory, up to 4133 (OC) MHz<br> Turbo M.2: Running at PCI-E Gen3 x4 maximizes performance for NVMe based SSDs.<br> Audio Boost: Reward your ears with studio grade sound quality.<br> X-Boost: Software that auto-detects and allows you to boost the performance of any storage or USB device.<br> Core Boost: With premium layout and fully digital power design to support more cores and provide better performance.', '', '', 'MOBO-LE04', 1),
(28, 4, 'EVGA Supernova GA 600W', 6500, 6300, 5, '194344076_EVGA-Supernova-GA-600W.png', 'A New Gold Contender', 'Unbeatable EVGA 10 Year Warranty and unparalleled EVGA Customer Support<br> <br> 80 PLUS Gold certified, with 90% (115VAC) / 92% (220VAC~240VAC) efficiency or higher under typical loads<br> <br> Fully Modular to reduce clutter and improve airflow<br> <br> NVIDIA SLI &amp; AMD Crossfire Ready<br> <br> Double Ball Bearing fan for exceptional reliability and quiet operation<br> <br> Heavy-duty protections, including OVP (Over Voltage Protection), UVP (Under Voltage Protection), OCP (Over Current Protection), OPP (Over Power Protection), SCP (Short Circuit Protection), and OTP (Over Temperature Protection)<br> <br> 100% Japanese Capacitors ensure long-term reliability<br> <br> EVGA ECO Intelligent Thermal Control System eliminates fan noise at low to medium loads<br> <br> Active Power Factor Correction<br> <br> DC-DC Converter improves 3.3V/5V stability', '', '', 'PSU-LE01', 1),
(29, 4, 'EVGA BR 700W', 4000, 3800, 5, '706802015_EVGA-BR-700W.png', 'Golden Standard ATX Form Factor', 'Quiet and Intelligent Auto Fan for near-silent operation<br> <br> 80 PLUS Bronze certified, with 85% efficiency or higher under typical loads<br> <br> 3 Year Warranty<br> Award winning EVGA Support backed by a full 3 Year Warranty!<br> <br> Heavy-duty protections, including OVP (Over Voltage Protection), UVP (Under Voltage Protection), OCP (Over Current Protection), OPP (Over Power Protection), SCP (Short Circuit Protection), and OTP (Over Temperature Protection)<br> <br> Active Power Factor Correction<br> <br> Single +12V. Rail<br> <br> DC-DC Converter improves 3.3V/5V stability', '', '', 'PSU-LE0', 1),
(30, 7, 'DOMINATOR PLATINUM RGB DDR4 3200MHz 1x4GB RAM', 1500, 1200, 5, '897439543_4gbram.png', 'In a Class of Its Own', 'CORSAIR DOMINATOR® PLATINUM RGB DDR4 Memory redefines premium DDR4 memory, with superior aluminum craftsmanship, tightly screened high-frequency memory chips and 12 ultra-bright, individually addressable CAPELLIX RGB LEDs. <br>CORSAIR DOMINATOR has long been the face of premium, high-performance memory. That heritage and experience has led to this: the most advanced DDR4 memory we’ve ever created.', '', '', 'RAM-LE01', 1),
(31, 7, 'DOMINATOR PLATINUM RGB DDR4 3200MHz 2x4GB RAM', 3000, 2800, 5, '921446196_8gbram.png', 'In a Class of Its Own', 'CORSAIR DOMINATOR® PLATINUM RGB DDR4 Memory redefines premium DDR4 memory, with superior aluminum craftsmanship, tightly screened high-frequency memory chips and 12 ultra-bright, individually addressable CAPELLIX RGB LEDs. <br>CORSAIR DOMINATOR has long been the face of premium, high-performance memory. That heritage and experience has led to this: the most advanced DDR4 memory we’ve ever created.', '', '', 'RAM-LE02', 1),
(32, 7, 'DOMINATOR PLATINUM RGB DDR4 3200MHz 2x8GB RAM', 6000, 5000, 5, '301021748_16gbram.png', 'In a Class of Its Own', 'CORSAIR DOMINATOR® PLATINUM RGB DDR4 Memory redefines premium DDR4 memory, with superior aluminum craftsmanship, tightly screened high-frequency memory chips and 12 ultra-bright, individually addressable CAPELLIX RGB LEDs. <br>CORSAIR DOMINATOR has long been the face of premium, high-performance memory. That heritage and experience has led to this: the most advanced DDR4 memory we’ve ever created.', '', '', 'RAM-LE03', 1),
(33, 8, 'SanDisk SATA 6.0GB/s 2.5-Inch 7mm Height Solid State Drive 124GB SSD', 2000, 1800, 5, '153000776_ssd124.png', 'Quality Fit on Your Pocket', '&bull; Upgrade your notebook or desktop to faster boot-up and shut-down times<br> &bull; Faster application load times and increased overall performance over traditional 7200 RPM hard drive<br> &bull; Increased reliability, durability and energy efficiency for lower power consumption<br> &bull; Easy upgrade and installation<br> &bull; Low power consumption; Increased durability<br> <br>', '', '', 'SSD-LE01', 1),
(34, 8, 'SanDisk SATA 6.0GB/s 2.5-Inch 7mm Height Solid State Drive 250GB SSD', 3000, 2800, 5, '570396517_ssd250.png', 'Quality Fit on Your Pocket', '&bull; Upgrade your notebook or desktop to faster boot-up and shut-down times<br> &bull; Faster application load times and increased overall performance over traditional 7200 RPM hard drive<br> &bull; Increased reliability, durability and energy efficiency for lower power consumption<br> &bull; Easy upgrade and installation<br> &bull; Low power consumption; Increased durability<br> <br>', '', '', 'SSD-LE02', 1),
(35, 8, 'SanDisk SATA 6.0GB/s 2.5-Inch 7mm Height Solid State Drive 500GB SSD', 4000, 3800, 5, '524354126_ssd500.png', 'Quality Fit on Your Pocket', '&bull; Upgrade your notebook or desktop to faster boot-up and shut-down times<br> &bull; Faster application load times and increased overall performance over traditional 7200 RPM hard drive<br> &bull; Increased reliability, durability and energy efficiency for lower power consumption<br> &bull; Easy upgrade and installation<br> &bull; Low power consumption; Increased durability<br> <br>', '', '', 'SSD-LE03', 1),
(36, 8, 'Seagate BarraCuda 3.5\" 7200RPM Internal Hard Drive 1TB HDD', 2800, 2600, 5, '125901132_hdd1tb.png', 'Amazing Versatility, Unlocked Dependability', 'Versatile HDDs for all your PC needs bring you industry-leading excellence in<br> personal computing.<br> <br> For over 20 years the BarraCuda family has delivered super-reliable storage for the<br> hard drive industry.<br> <br> Capacities up to 8 TB for desktops, BarraCuda leads the market with the widest<br> range of storage options available.<br> <br> Advanced Power modes help save energy without sacrificing performance.<br> <br> SATA 6 Gb/s interface optimises burst performance.<br> <br> Seagate Secure&reg;models provide Self-Encrypting Drive (SED) hardware-based data<br> security and deliver an Instant Secure Erase feature for safe, fast and easy drive<br> retirement. They meet NIST 800-88 media sanitization specifications and also support<br> the Trusted Computer Group (TCG) Opal standard.<br> <br>', '', '', 'HDD-LE01', 1),
(37, 8, 'Seagate BarraCuda 3.5\" 7200RPM Internal Hard Drive 2TB HDD', 3600, 3200, 5, '837449640_hdd2tb.png', 'Amazing Versatility, Unlocked Dependability', 'Versatile HDDs for all your PC needs bring you industry-leading excellence in<br> personal computing.<br> <br> For over 20 years the BarraCuda family has delivered super-reliable storage for the<br> hard drive industry.<br> <br> Capacities up to 8 TB for desktops, BarraCuda leads the market with the widest<br> range of storage options available.<br> <br> Advanced Power modes help save energy without sacrificing performance.<br> <br> SATA 6 Gb/s interface optimises burst performance.<br> <br> Seagate Secure&reg;models provide Self-Encrypting Drive (SED) hardware-based data<br> security and deliver an Instant Secure Erase feature for safe, fast and easy drive<br> retirement. They meet NIST 800-88 media sanitization specifications and also support<br> the Trusted Computer Group (TCG) Opal standard.<br> <br>', '', '', 'HDD-LE02', 1),
(38, 8, 'Seagate BarraCuda 3.5\" 7200RPM Internal Hard Drive 4TB HDD', 5000, 4400, 5, '342644223_hdd4tb.png', 'Amazing Versatility, Unlocked Dependability', 'Versatile HDDs for all your PC needs bring you industry-leading excellence in<br> personal computing.<br> <br> For over 20 years the BarraCuda family has delivered super-reliable storage for the<br> hard drive industry.<br> <br> Capacities up to 8 TB for desktops, BarraCuda leads the market with the widest<br> range of storage options available.<br> <br> Advanced Power modes help save energy without sacrificing performance.<br> <br> SATA 6 Gb/s interface optimises burst performance.<br> <br> Seagate Secure&reg;models provide Self-Encrypting Drive (SED) hardware-based data<br> security and deliver an Instant Secure Erase feature for safe, fast and easy drive<br> retirement. They meet NIST 800-88 media sanitization specifications and also support<br> the Trusted Computer Group (TCG) Opal standard.<br> <br>', '', '', 'HDD-LE03', 1),
(39, 5, 'NVIDIA GTX 1660ti', 14800, 14300, 5, '631779823_NVIDIA-GTX-1660ti.png', 'THE GAMING SUPERCHARGER', 'Experience the powerful graphics performance of the award-winning NVIDIA Turing architecture with GeForce&reg; GTX 16 Series graphics cards and laptops.<br> TURING SHADERS<br> Featuring concurrent execution of floating point and integer operations, adaptive shading technology, and a new unified memory architecture, Turing shaders enable greater performance on today&rsquo;s games. Get improved power efficiency over the previous generation for a faster, cooler and quieter gaming experience.<br> <br> FRAMES WIN GAMES<br> HIGH-FPS GAMING POWERED BY GEFORCE<br> Faster graphics deliver higher frame rates. Higher frame rates let you see things earlier and give you a better chance of hitting your target.<br> <br> NVIDIA STUDIO<br> FROM CONCEPT TO COMPLETION. FASTER.<br> Create without compromise. Studio combines NVIDIA GeForce GPUs with exclusive NVIDIA Studio Drivers designed to supercharge creative applications. Unlock dramatic performance and reliability&mdash;so you can create at the speed of imagination. <br> <br> GEFORCE EXPERIENCE<br> Capture and share videos, screenshots, and livestreams with friends. Keep your GeForce drivers up to date and optimize your game settings. GeForce Experience&trade; lets you do it all. It\'s the essential companion to your GeForce graphics cards and laptops.<br>', '', '', 'GPU-LE01', 1),
(40, 5, 'AMD RX 580', 12200, 11800, 5, '411764780_AMD-rX-580.png', 'HD Gaming and Beyond. Incredible VR.', 'The Radeon RX 580 is a performance-segment graphics card by AMD, launched on April 18th, 2017. Built on the 14 nm process, and based on the Polaris 20 graphics processor, in its Polaris 20 XTX variant, the card supports DirectX 12. This ensures that all modern games will run on Radeon RX 580. The Polaris 20 graphics processor is an average sized chip with a die area of 232 mm&sup2; and 5,700 million transistors. It features 2304 shading units, 144 texture mapping units, and 32 ROPs. AMD has paired 8 GB GDDR5 memory with the Radeon RX 580, which are connected using a 256-bit memory interface. The GPU is operating at a frequency of 1257 MHz, which can be boosted up to 1340 MHz, memory is running at 2000 MHz (8 Gbps effective).<br> Being a dual-slot card, the AMD Radeon RX 580 draws power from 1x 8-pin power connector, with power draw rated at 185 W maximum. Display outputs include: 1x HDMI 2.0b, 3x DisplayPort 1.4a. Radeon RX 580 is connected to the rest of the system using a PCI-Express 3.0 x16 interface. The card measures 241 mm in length, and features a dual-slot cooling solution. Its price at launch was 229 US Dollars.<br> <br> Graphics Processor<br> GPU Name<br> Polaris 20<br> <br> GPU Variant<br> Polaris 20 XTX<br> (215-0910038)<br> <br> Architecture<br> GCN 4.0<br> <br> Foundry<br> GlobalFoundries<br> <br> Process Size<br> 14 nm<br> <br> Transistors<br> 5,700 million<br> <br> Die Size<br> 232 mm&sup2;<br> <br>', '', '', 'GPU-LE02', 1),
(41, 5, 'NVIDIA GTX 1050ti', 7800, 7500, 5, '383431453_NVIDIA-GTX-1050ti.png', ' Loaded with the industry’s most innovative NVIDIA Game Ready technologies.', 'GPU Engine Specs<br> CUDA Cores<br> 768<br> Graphics Clock (MHz)<br> 1290<br> Processor Clock (MHz)<br> 1392<br> Graphics Performance<br> high-6747<br> Memory Specs<br> Memory Clock<br> 7 Gbps<br> Standard Memory Config<br> 4 GB<br> Memory Interface<br> GDDR5<br> Memory Interface Width<br> 128-bit<br> Memory Bandwidth (GB/sec)<br> 112<br> Feature Support<br> Supported Technologies<br> CUDA, 3D Vision, PhysX, NVIDIA G-SYNC&trade;, Ansel<br> Thermal and Power Specs<br> Maximum GPU Temperature (in C)<br> 97<br> Maximum Graphics Card Power (W)<br> 75<br> Minimum System Power Requirement (W)<br> 300<br> <br>', '', '', 'GPU-LE03', 1),
(42, 10, 'Versa H22', 2900, 2600, 5, '659618037_versa-h22.png', 'Ideal for home-computer builders and gamers – Versa H22 Mid-tower gaming chassis', 'Thermaltake Versa H22 Mid-tower chassis<br> Ideal for home-computer builders and gamers, with enough space for high-end hardware and expansion. The ample ventilation options, cleanable air filter, and a perforated mesh bezel help to keep the entire system cool and dust-free. Versa H22 combines a manageable frame size with extensive options to customize user&rsquo;s computer or gaming system<br> <br> <br> Gaming Design<br> Designed for gamer, perforated metal mesh front and top panel to allow quick heat dissipation and rapid air intake for maximum ventilation. The heighten foot-stands at the bottom help to enhance airflow.<br> <br> <br> Tool-free Installation<br> Innovative 5.25&rdquo; &amp; 3.5&rdquo; tool-free drive bay design minumized the hassels of installing/removing. Trio drive bay concept &ldquo;3 + 3 + 3&rdquo;, a perfect ratio for accessory and storage devices.Also, Tool-free mount fan can be clipped on the dust filter.<br> <br> <br> Handy I/O ports<br> The perforated front-top panel has implemented one data transfer SuperSpeed USB 3.0 port along with one standard USB 2.0 port, a HD microphone and headset jacks, to grand direct access when needed.<br> <br> Optimized Ventilation<br> Preinstalled one 120mm rear exhaust fan, optional 2 x 120mm intake fans to optimize system ventilation with dust filter.<br> <br> Convenient Support<br> Pre-mounting holes to support motherboards up to standard ATX and CPU cooler installation, long graphic card also supported as well as Advanced Cable Management and Liquid Cooling System.<br> <br>', '', '', 'CASE-LE01', 1),
(43, 10, 'HEC HX300', 2600, 2300, 5, '631437391_hec-hx3000.png', 'Silver Age of Computing', 'Learn more about Compucase HX300<br> Model<br> Brand<br> HEC<br> Model<br> HX300<br> Details<br> Type<br> ATX Mid Tower<br> Color<br> Black<br> Case Material<br> SECC<br> With Power Supply<br> No<br> Power Supply Mounted<br> Top<br> Motherboard Compatibility<br> Micro ATX / ATX / Mini-ITX<br> Side Panel Window<br> Yes<br> Expansion<br> Internal 3.5&quot; Drive Bays<br> 2<br> Internal 2.5&quot; Drive Bays<br> 3<br> Expansion Slots<br> 7<br> Front Panel Ports<br> Front Ports<br> 1 x USB 2.0 / 1 x USB 3.0 / Audio<br> Dimensions &amp; Weight<br> Max PSU Length<br> 370mm without ODD210mm with ODD<br> Dimensions (H x W x D)<br> 18.31&quot; x 7.01&quot; x 16.85&quot;<br> Weight<br> 14.00 lbs.<br> Additional Info<br> Features<br> Up to 3 x 2.5&quot; and 2 x 3.5&quot; drive bays for the best expansionInternal black coating steel structureFull size ATX M/B application to meet Intel &amp; AMD designInternal design for extended graphic cardThermally-Advantaged ChassisThick 0.6mm Housing12cm rear fan for excellent heat dissipationNew generation power supply holding bayUSB 3.0X1 USB 2.0X1, HD Audio, port in front panel<br> <br>', '', '', 'CASE-LE02', 1),
(44, 10, 'Cougar MX340', 5500, 5300, 5, '676731953_Cougar-MX340.png', 'The Case You Need', 'The Case You Need<br> Space for a high-end build, convenient installation and an elegant design with a big tempered glass meet in this wonderful case.<br> A Window to Glory<br> A brushed frontal texture complements MX340&rsquo;s black body to create a design that makes it a worthy heir of the COUGAR line of MX cases. The tempered glass panel on its left side allows you to see your computer&rsquo;s components and gives you an excellent opportunity to install RGB strips and other lighting devices that will make your case overflow with light.<br> <br> Ready for the Newest Games<br> MX340 is more than looks; it can house a full-fledged high-end gaming computer with a graphics card up to 330 mm and support for six fans and a 360mm water cooling radiator you&rsquo;ll get all the horsepower you need to run the latest games and the cooling your components require.<br> <br> <br> Extra-Wide<br> MX340&rsquo;s 205mm width ensures there will be plenty of room in the case. This extra space makes installation of components more comfortable and improves the internal airflow. Additionally, the two air filters (top and bottom) can be easily removed to clean them and prevent dust accumulation.<br> <br> Excellent Cooling<br> With the possibility of installing up to two water cooling radiators and six fans, MX340 allows you to protect your computer&rsquo;s most important components from overheating.<br> <br> <br>', '', '', 'CASE-LE03', 1),
(45, 11, 'Global Elite Pack', 27000, 25000, 5, '965680221_csgo.png', 'Counter-Strike: Global Offensive Pack', 'RAM: 4GB DDR4<br> CPU: Ryzen 3 2200G<br> MOBO: A320M<br> STORAGE: 120GB SSD<br> GPU: AMD RX 580<br> CASE: VERSA H22<br>', '', '', 'PREB-01', 1),
(46, 11, 'Radiant Pack', 22000, 20000, 5, '726498969_valorant.png', 'Valorant Pack', 'RAM: 4GB DDR4<br> CPU: ATHLON 240GE<br> MOBO: A320M<br> STORAGE: 120GB SSD<br> GPU: RADEON VEGA<br> CASE: VERSA H22<br>', '', '', 'PREB-02', 1),
(47, 11, '2077 Pack', 62000, 55000, 5, '458912556_cyberpunk.png', 'Cyberpunk 2077 Pack', 'RAM: 16GB DDR4<br> CPU: i5-11400F<br> MOBO: B450M<br> STORAGE: 512GB SSD<br> GPU: RTX 2070 Super<br> CASE: AeroCool Scar<br>', '', '', 'PREB-03', 1),
(48, 11, 'Five Star Pack', 35000, 32000, 5, '699857065_gta.png', 'Grand Theft Auto V Pack', 'RAM: 16GB DDR4<br> CPU: Ryzen 5 5600<br> MOBO: H510M-HDV<br> STORAGE: 512GB SSD<br> GPU: RX 5700 XT<br> CASE: Forge M<br>', '', '', 'PREB-04', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile_number` varchar(11) NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `mobile_number`, `added_on`) VALUES
(1, 'Alexander Cebreiros', 'alexanderjames.cebreiros@gmail.com', '1234', '09081631892', '2022-07-08 20:56:22'),
(3, 'Alexander James B Cebreiros', 'ajbcebreiros@iskolarngbayan.pup.edu.ph', '123', '09081631892', '2022-07-11 03:17:18'),
(4, 'Kurt Dela Cruz', 'abc@123.com', '123', '09081631892', '2022-07-12 07:13:35'),
(5, 'Jhaymie', '123@abc.com', '123', '09081631892', '2022-07-13 10:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `user_order`
--

CREATE TABLE `user_order` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `address` varchar(10000) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postcode` int NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `total_price` float NOT NULL,
  `payment_status` int NOT NULL,
  `order_status` int NOT NULL,
  `added_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user_order`
--

INSERT INTO `user_order` (`id`, `user_id`, `address`, `city`, `postcode`, `payment_type`, `total_price`, `payment_status`, `order_status`, `added_on`) VALUES
(6, 3, '815 B Amarillo St. Mandaluyong City', 'Mandaluyong, NCR, Philippines', 1550, 'cod', 27000, 2, 1, '2022-07-13 09:02:22'),
(7, 4, '815B Amarillo St', 'Mauway', 1550, 'cod', 1906000, 1, 2, '2022-07-13 09:21:42'),
(8, 5, '815 B Amarillo St. Mandaluyong City', 'Mandaluyong, NCR, Philippines', 1550, 'GCash', 63000, 2, 5, '2022-07-13 10:51:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_status`
--
ALTER TABLE `order_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_status`
--
ALTER TABLE `payment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_status`
--
ALTER TABLE `order_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment_status`
--
ALTER TABLE `payment_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
