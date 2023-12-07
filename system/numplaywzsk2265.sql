-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: Št 07.Sep 2023, 17:22
-- Verzia serveru: 10.4.28-MariaDB
-- Verzia PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `numplaywzsk9423`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `hry`
--

CREATE TABLE `hry` (
  `id` int(255) NOT NULL,
  `title` varchar(60) NOT NULL,
  `category` set('all','Action','Adult','Adventure','Anime','Building','Casual','Eroge','Hack and Slash','Hidden Object','Horror','Management','Mature','Nudity','Open World / Sandbox','Point & Click','Puzzle','Racing','RPG','RTS','Sci-fi','Shooter','Simulation','Sport','Strategy','Survival','Text-Based','Tower Defense','Turn-Based','Visual Novel','VR') NOT NULL,
  `img` varchar(900) NOT NULL,
  `background-img` varchar(200) NOT NULL,
  `verze` set('64','32') NOT NULL,
  `m-os` varchar(200) NOT NULL,
  `m-cpu` varchar(200) NOT NULL,
  `m-ram` varchar(200) NOT NULL,
  `m-gpu` varchar(200) NOT NULL,
  `m-directx` varchar(200) NOT NULL,
  `m-hdd/ssd` varchar(200) NOT NULL,
  `r-os` varchar(200) NOT NULL,
  `r-cpu` varchar(200) NOT NULL,
  `r-ram` varchar(200) NOT NULL,
  `r-gpu` varchar(200) NOT NULL,
  `r-directx` varchar(200) NOT NULL,
  `r-hdd/ssd` varchar(200) NOT NULL,
  `download32` varchar(80) NOT NULL,
  `download64` varchar(80) NOT NULL,
  `info_game` text NOT NULL,
  `screen_game` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `hry`
--

INSERT INTO `hry` (`id`, `title`, `category`, `img`, `background-img`, `verze`, `m-os`, `m-cpu`, `m-ram`, `m-gpu`, `m-directx`, `m-hdd/ssd`, `r-os`, `r-cpu`, `r-ram`, `r-gpu`, `r-directx`, `r-hdd/ssd`, `download32`, `download64`, `info_game`, `screen_game`) VALUES
(1, 'Minecraft', 'Open World / Sandbox', 'minecraft.png', 'minecraft', '64,32', 'Windows 7 (32bit)', '3.16Ghz Intel Core 2 Duo E8500', '4GB', '1GB (AMD Radeon HD 5550 or Nvidia GeForce GT 430)', 'Versions 11', '35GB', 'Windows 7 (64bit)', 'AMD: Phenom II X4 955 - 4 Core, 3.2 GHz or Intel: Core 2 Quad Q9650 - 4 Core, 3.0 GHz', '8 GB RAM', '2GB (AMD GPU: AMD Radeon R9 200 Series or Nvidia GPU: Nvidia GeForce GTX660)', 'Versions 11', '35GB', 'https://downloadlink.cz/minecraft/32.exe', 'https://downloadlink.cz/minecraft/64.exe', 'Minecraft is a 3D sandboxgame about placing blocks and going on adventures. There are no specific goals to accomplish, allowing players a large amount of freedom in choosing how to play the game. Since its release in 2009, Minecraft has quickly become one of the most popular games in the world. As an indie game built by a very small team, Minecraft’s success isn’t down to massive resources or a carefully planned advertising strategy. Minecraft focuses on allowing the player to explore, interact with, and modify a dynamically-generated map made of one-cubic-meter-sized blocks. In addition to blocks, the environment features plants, mobs, and items. Some activities in the game include mining for ore, fighting hostile mobs, and crafting new blocks and tools by gathering various resources found in the game.', ''),
(2, 'Alien isolation', 'Action,Horror,Sci-fi', 'alien_isolation.png', 'alian_isolation', '64,32', 'Windows 7 (32-bit)', ' 3.16Ghz Intel Core 2 Duo E8500 alebo AMD Athlon 64 X2 Dual Core 6400+', '4GB', '1GB VRAM (AMD Radeon HD 5550 alebo Nvidia GeForce GT 430)', ' Verzia 11', '35GB', 'Windows 7 (64-bit)', '3.4 GHz Intel Core i7-3770 alebo 4.0 GHz AMD FX-8350', '8GB', '2GB VRAM (AMD Radeon R9 200 Series alebo Nvidia GeForce GTX 660)', ' Verzia 11', '35GB', '', '', 'Discover the true meaning of fear in Alien: Isolation, a survival horror set in an atmosphere of constant dread and mortal danger. Fifteen years after the events of Alien™, Ellen Ripley’s daughter, Amanda enters a desperate battle for survival, on a mission to unravel the truth behind her mother’s disappearance. As Amanda, you will navigate through an increasingly volatile world as you find yourself confronted on all sides by a panicked, desperate population and an unpredictable, ruthless Alien. Underpowered and underprepared, you must scavenge resources, improvise solutions and use your wits, not just to succeed in your mission, but to simply stay alive.', ''),
(3, 'Black mesa', 'Action', 'black mesa 1.png', 'black_mesa', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Relive Half-Life in this highly acclaimed, fan-made recreation. Black Mesa is the award winning re-imagining of Gordon Freeman’s landmark journey through the Black Mesa Research Facility. Re-experience the game that raised the bar for the entire game industry all over again! The over 10 hour single player experience has greatly improved from the mod release; new visuals, new voice over, updated gameplay encounters, stability changes and more. Xen is not part of the Early Access release, but will be included as a free update when it is ready. Expect tremendously detailed environments, old-school tough-as-nails combat, and a gripping story with memorable characters. The all-new soundtrack, voice acting, choreography and dialogue create a more expansive and immersive experience than ever before! Fight with or against your friends, in two game modes across 10 iconic maps from the Half-Life universe including Bounce, Gasworks, Stalkyard, Undertow and Crossfire! Use the same tools as the developers! Create your own mods, modes and maps for Black Mesa and Black Mesa Multiplayer and then share your work, and subscribe to others, on the Steam Workshop! Collect the full set of trading cards, backgrounds, emoticons, and achievements! Steam Cloud, Steam Workshop and partial controller support!', ''),
(4, 'Alien vs predator', 'Action,Horror,Sci-fi', 'alien vs predator.png', 'aliens-vs-predator', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Bringing the legendary war between two of science-fiction’s most popular characters to FPS fans, AvP delivers three outstanding single player campaigns and provides untold hours of unique 3-way multiplayer gaming. Experience distinctly new and thrilling first person gameplay as you survive, hunt and prey in the deadly jungles and swamps surrounding the damned colony of Freya’s Prospect. As the most deadly species in the universe, the Alien offers you the chance to play as the very stuff of nightmares – the monster in the dark swarming forward with countless others, jaws like a steel trap and claws like blades. Play all sides off against each other in a series of unique 3-way online modes and go tooth-to-claw-to-pulse rifle in the reinvention of one of multiplayer gaming’s defining moments.', ''),
(5, 'Call of duty black ops 2', 'Action', 'call of duty black ops 2 .png', 'call-of-duty-black-ops-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Pushing the boundaries of what fans have come to expect from the record-setting entertainment franchise, Call of Duty®: Black Ops II propels players into a near future, 21st Century Cold War, where technology and weapons have converged to create a new generation of warfare.', ''),
(6, 'Cluster truck', 'Adventure', 'cluster truck.png', 'clustertruck', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Clustertruck is a new kind of platformer on-top of a speeding highway! Use agility and acrobatics through insane levels in a game of “the floor is lava” on top of unpredictable, speeding trucks! The game only gets harder when dangers such as swinging hammers, lasers and flamethrowers are added!', ''),
(7, 'Call of duty black ops ', 'Action', 'call of duty black ops 1.png', 'call-of-duty-black-ops', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'The biggest first-person action series of all time and the follow-up to last year’s blockbuster Call of Duty®: Modern Warfare 2 returns with Call of Duty®: Black Ops. Call of Duty®: Black Ops will take you behind enemy lines as a member of an elite special forces unit engaging in covert warfare, classified operations, and explosive conflicts across the globe. With access to exclusive weaponry and equipment, your actions will tip the balance during the most dangerous time period mankind has ever known. An epic campaign and story that takes you to a variety of locations and conflicts all over the world where you will play as an elite Black Ops soldier in deniable operations where if you are caught, captured or killed, your country will disavow all knowledge of your existence.', ''),
(8, 'Counter strike', 'Action', 'counter strike source.png', 'counter-strike', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'klasicka strieľačka', ''),
(9, 'Don \'t starve', 'Survival', 'dontstarve.png', 'dont-starve', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdasdasd', ''),
(10, 'Doom ', 'RPG', 'doom 2016.png', 'doom', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Developed by id software, the studio that pioneered the first-person shooter genre and created multiplayer Deathmatch, DOOM returns as a brutally fun and challenging modern-day shooter experience. Relentless demons, impossibly destructive guns, and fast, fluid movement provide the foundation for intense, first-person combat – whether you’re obliterating demon hordes through the depths of Hell in the single-player campaign, or competing against your friends in numerous multiplayer modes. Expand your gameplay experience using DOOM SnapMap game editor to easily create, play, and share your content with the world. You’ve come here for a reason. The Union Aerospace Corporation’s massive research facility on Mars is overwhelmed by fierce and powerful demons, and only one person stands between their world and ours. As the lone DOOM Marine, you’ve been activated to do one thing – kill them all.', ''),
(11, 'Doom 3', 'RPG', 'doom3.png', 'doom-3', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'DOOM 3 BFG Edition is the ultimate collection of games that defined the first person shooter including DOOM, DOOM II, DOOM 3, and DOOM 3: Resurrection of Evil, and The Lost Mission.', ''),
(12, 'Far cry', 'Strategy', 'far cry.png', 'Far-Cry', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'A tropical paradise seethes with hidden evil in Far Cry®, a cunningly detailed action shooter that pushes the boundaries of combat to shocking new levels. Freelance mariner Jack Carver is cursing the day he ever came to this island. A week ago, a brash female reporter named Valerie had offered him an incredible sum of cash to take her to this unspoiled paradise. Shortly after docking, however, Jack’s boat was greeted by artillery fire from a mysterious militia group swarming about the island. With his boat destroyed, his money gone, and the gorgeous Valerie suddenly missing, Jack now finds himself facing an army of mercenaries amidst the wilds of the island, with nothing but a gun and his wits to survive. But the further he pushes into the lush jungle canopy, the stranger things become. Jack encounters an insider within the militia group who reveals the horrific details of the mercenaries’ true intentions. He presents Jack with an unsettling choice: battle the deadliest mercenaries, or condemn the human race to a maniac’s insidious agenda.', ''),
(13, 'Forza Horizon 4', 'Sci-fi', 'ForzaHorizon4-lg.png', 'forza-horizon-4', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'klasicke preteky', ''),
(14, 'Geometry dash', 'Adventure', 'geometry dash.png', 'geometry-dash', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Jump and fly your way through danger in this rhythm-based action platformer! Prepare for a near impossible challenge in the world of Geometry Dash. Push your skills to the limit as you jump, fly and flip your way through dangerous passages and spiky obstacles.', ''),
(15, 'Hack net', 'Simulation', 'Hacknet.png', 'Hacknet', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'vyskušaj si heknuť pc', ''),
(16, 'Half life 2', 'Open World / Sandbox', 'half life 2.png', 'half-life-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdsadsad', ''),
(17, 'IGI 1', 'Shooter', 'igi1.png', 'project-igi', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdasdasd', ''),
(18, 'IGI 2', 'Shooter', 'igi 2.png', 'project-igi-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dasdad', ''),
(19, 'Max payne 2', 'Strategy', 'MaxPayne2.png', 'max-payne-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dfsdfs', ''),
(20, 'Mirrors edge', 'Hack and Slash', 'mirrors edge.png', 'mirrors-edge', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dasdsa', ''),
(21, 'Need for speed carbon', 'Sport', 'need for speed carbon.png', 'need-for-speed-carbon', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdad', ''),
(22, 'Need for speed underground 2', 'Sport', 'need for speed underground 2.png', 'need-for-speed-underground-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'adasda', ''),
(23, 'Outlast', 'Horror', 'Outlast.png', 'Outlast', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Hell is an experiment you can\'t survive in Outlast, a first-person survival horror game developed by veterans of some of the biggest game franchises in history. As investigative journalist Miles Upshur, explore Mount Massive Asylum and try to survive long enough to discover its terrible secret ... if you dare.', ''),
(24, 'Payday 2', 'Shooter', 'payday_2.png', 'payday-2', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'PAYDAY 2 is an action-packed shooter that once again lets gamers don the masks of the original PAYDAY crew – Dallas, Hoxton, Wolf and Chains – as they descend on Washington DC for an epic crime spree. The new CRIMENET network offers a huge range of dynamic contracts, and players are free to choose anything from small-time convenience store hits or kidnappings, to big league cyber-crime or emptying out major bank vaults for that epic PAYDAY. While in DC, why not participate in the local community, and run a few political errands?', ''),
(25, 'Serious sam', 'Shooter', 'serious sam.png', 'serious-sam-the-first-encounter', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdadas', ''),
(26, 'Sword art online fatal bullet', 'Anime', 'sword art online fatal bullet.png', 'sword-art-online-fatal-bullet', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdasdad', ''),
(27, 'The forest', 'Open World / Sandbox', 'the forest.png', 'the-forest', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dasdas', ''),
(28, 'The walking dead', 'Strategy', 'the walking dead.png', 'The-Walking-Dead', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdad', ''),
(29, 'Wolfenstein the old blood', 'Shooter', 'wolfenstein the old blood.png', 'wolfenstein-the-old-blood', '64,32', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdadasd', '');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `remember_tokens`
--

CREATE TABLE `remember_tokens` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `token` varchar(200) NOT NULL,
  `expiration` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `over_email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `reg_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `over_email`, `password`, `role`, `reg_date`) VALUES
(12, 'vlado', 'vladimirondas02@gmail.com', 'no', '5240', 'user', '2023-07-10'),
(13, 'vlado', 'vladimirondas02@gmail.com', 'no', '$2y$10$W2CrHubR/xZlYge9KsJzi.l8UFUMfK/6VKF.ois5ktVL/NA8sLcoC', 'user', '2023-07-10'),
(14, 'vlado1', 'vladimirondas02@gmail.com', 'no', '$2y$10$apBRHW5ePWJHivA5EDnq2esfpKCrQKtCjrEzVcnAHViLwCOA7buG6', 'user', '2023-07-10'),
(15, 'dads', 'dsadsa@gmail.com', 'no', '$2y$10$7ArowLIbw1bTjMLx9CNFReIJ76cWMqTZH1Ol59l2Mvaq8fEIRImim', 'user', '2023-07-26'),
(16, 'vlado123', 'dsadsa@gmail.com', 'no', '$2y$10$rzdcxij4mOs2WXLxq.93YupstJy5Nub0yedrkPiLQnVcrBH4K9h46', 'user', '2023-07-26'),
(17, 'vlado122', 'Vlado@gmail.com', 'no', '$2y$10$fDZVmSpe.OG00Xu.QSOVseIh92gpQmBhZbpEMBjzje2yaZpTVj1WO', 'user', '2023-07-26'),
(19, 'Wlado', 'vladimirondas02@gmail.com', 'no', '$2y$10$OswTPB6LHinyTU7OkW954uscb3WXmGGIDBCHtp7Kl/zdsST0PDEGC', 'user', '05-08-2023');

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `hry`
--
ALTER TABLE `hry`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `remember_tokens`
--
ALTER TABLE `remember_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexy pre tabuľku `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `hry`
--
ALTER TABLE `hry`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pre tabuľku `remember_tokens`
--
ALTER TABLE `remember_tokens`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
