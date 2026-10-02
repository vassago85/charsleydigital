<?php

return [
    'projects' => [
        [
            'slug' => 'nrapa',
            'logo' => '/images/brands/nrapa.png',
            'url' => 'https://nrapa.ranyati.co.za',
            'index' => '01',
            'name' => 'NRAPA',
            'client' => 'National Rifle and Pistol Association',
            'kicker' => 'Membership platform',
            'summary' => 'Membership, compliance, certificates, and a QR check a member can actually show.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Livewire', 'MySQL', 'Redis', 'Mailgun'],
            'links' => [
                ['label' => 'nrapa.ranyati.co.za', 'href' => 'https://nrapa.ranyati.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'NRAPA needed a national membership platform, not a spreadsheet with a login. Applications, compliance, certificates, and proof of membership had to live in one place, and the association had to keep ownership of the data.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'Members hold a record they can prove. Staff issue certificates and run compliance without leaving the system. A QR check confirms a certificate without a phone call to the office. POPIA is part of the build: dedicated hosting, and the data stays the association’s.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel and Livewire on MySQL, with Redis for the fast paths, document generation for certificates, object storage for files, and Mailgun for the mail that has to arrive. The web app, queue, and scheduler ship together.',
                ],
            ],
        ],
        [
            'slug' => 'saprf',
            'logo' => '/images/brands/saprf.png',
            'url' => 'https://saprf.co.za',
            'index' => '02',
            'name' => 'SAPRF',
            'client' => 'South African Precision Rifle Federation',
            'kicker' => 'Federation platform',
            'summary' => 'Membership, PRS and PR22 matches, payments, and national standings in one system.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Livewire', 'MariaDB', 'Redis', 'Mailgun'],
            'links' => [
                ['label' => 'saprf.co.za', 'href' => 'https://saprf.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'The South African Precision Rifle Federation needed one place to administer memberships, run match operations, take payments, and publish the standings used for governance and selection.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'The platform covers both disciplines, PRS and PR22. Memberships, renewals, and QR certificates. Match creation, registrations, capacity, and waiting lists. Online payments, national and provincial standings, sponsorship, and the reports the federation actually uses.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel on MariaDB. The public site, the queue, and the scheduler run the same application image, so a deploy does not leave the workers on yesterday’s code. Mail goes through Mailgun. Charsley Digital hosts it.',
                ],
            ],
        ],
        [
            'slug' => 'pprc',
            'logo' => '/images/brands/pprc.png',
            'url' => 'https://pretoriaprc.co.za',
            'index' => '03',
            'name' => 'PPRC',
            'client' => 'Pretoria Rifle & Pistol Club',
            'kicker' => 'Club platform',
            'summary' => 'Membership, match entries, payments, endorsements, and certificates for the club.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Livewire', 'Postgres', 'Redis', 'MinIO'],
            'links' => [
                ['label' => 'pretoriaprc.co.za', 'href' => 'https://pretoriaprc.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'Pretoria Rifle & Pistol Club needed the club’s real work online: who is a member, who is shooting this weekend, who has paid, and which documents a member can prove.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'Membership applications and renewals, match entries, payments, and invoices. Endorsement letters and membership certificates, each with a public verification page. Members use a portal. Staff run the club from the same system.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel with Postgres, Redis, and MinIO for files, behind the club’s public address at pretoriaprc.co.za. Queues and scheduled jobs sit beside the web app and update with it.',
                ],
            ],
        ],
        [
            'slug' => 'deadcenter',
            'logo' => '/images/brands/deadcenter.png',
            'url' => 'https://deadcenter.co.za',
            'index' => '04',
            'name' => 'DeadCenter',
            'client' => 'Shooting organisations',
            'kicker' => 'Match scoring',
            'summary' => 'Seasons, squadding, and scoring on the web, plus an Android app for the range.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Kotlin', 'Jetpack Compose', 'Room'],
            'links' => [
                ['label' => 'deadcenter.co.za', 'href' => 'https://deadcenter.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'Match directors needed scoring that works in the office and on the range. Results, seasons, and a public portal are one product. The firing line is another problem: the network is not reliable, and the stage still has to be scored.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'Organisations run matches, squadding, and seasons. Scores can be normalised so a match winner takes the match’s point value and everyone else scales against them, or kept as raw totals. A public portal publishes matches and results. Sponsors and fees sit with the organisation, not in a side spreadsheet.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'The web platform is Laravel. The range companion is Android: Kotlin, Jetpack Compose, and Room, with a scoring screen bundled in the app so a stage can keep going when the connection drops.',
                ],
            ],
        ],
        [
            'slug' => 'centrevision',
            'logo' => '/images/brands/centrevision.png',
            'url' => 'https://centrevision.co.za',
            'index' => '05',
            'name' => 'CentreVision',
            'client' => 'Sites and venues',
            'kicker' => 'Site traffic',
            'summary' => 'Vehicle reads, watchlists, dwell, and traffic reports. It does not open gates.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Postgres', 'Redis'],
            'links' => [
                ['label' => 'centrevision.co.za', 'href' => 'https://centrevision.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'Sites needed a clear picture of vehicle traffic: what the cameras read, which plates are on a watchlist, how long vehicles stay, and a report someone can trust. The software had to stop at the report. Opening a gate is a different system.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'CentreVision takes camera detections, classifies traffic, and labels watchlist matches. Categories change how a read is labelled and alerted. Dwell, site activity, and traffic patterns roll into reports. It does not control gates or barriers.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel and Postgres, with Redis beside them. Database backups are a rolling set of snapshots, cut on a schedule, so a restore is a known file and not a hope.',
                ],
            ],
        ],
        [
            'slug' => 'ranyati',
            'logo' => '/images/brands/ranyati.png',
            'url' => 'https://ranyati.co.za',
            'index' => '06',
            'name' => 'Ranyati',
            'client' => 'Ranyati Firearm Motivations',
            'kicker' => 'Group sites',
            'summary' => 'Motivations, NRAPA membership, secure storage, and used firearms. Live at ranyati.co.za.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel'],
            'links' => [
                ['label' => 'ranyati.co.za', 'href' => 'https://ranyati.co.za'],
                ['label' => 'Motivations', 'href' => 'https://motivations.ranyati.co.za'],
                ['label' => 'NRAPA', 'href' => 'https://nrapa.ranyati.co.za'],
                ['label' => 'Storage', 'href' => 'https://storage.ranyati.co.za'],
                ['label' => 'Arms', 'href' => 'https://arms.ranyati.co.za'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'Ranyati Group runs four businesses under one name: firearm licence motivations, NRAPA membership, secure storage, and used firearms. Each one needed its own public site, and a visitor had to see they belong together.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'ranyati.co.za is the group. Motivations, NRAPA, storage, and arms each have their own address. The membership system behind NRAPA is the association platform. These sites are the businesses, not a pitch deck.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel, hosted on its own. The live addresses are ranyati.co.za, motivations.ranyati.co.za, nrapa.ranyati.co.za, storage.ranyati.co.za, and arms.ranyati.co.za.',
                ],
            ],
        ],
        [
            'slug' => 'axionis-pos',
            'logo' => null,
            'url' => null,
            'index' => '07',
            'name' => 'Axionis POS',
            'client' => 'Axionis',
            'kicker' => 'Point of sale',
            'summary' => 'The till. The sale happens at the counter and the record stays with the business.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => [],
            'links' => [],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'Axionis needed a point of sale that belongs to the business. The sale happens at the counter. The record should not live inside a till rental that the business cannot leave.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'Axionis POS takes the sale and keeps the trading record. It is the counter system, built for that business rather than a generic package with their logo on it.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'It is hosted with the other platforms, in its own containers on dedicated hardware. The business keeps the data.',
                ],
            ],
        ],
        [
            'slug' => 'charsley-digital',
            'logo' => null,
            'url' => 'https://charsleydigital.co.za',
            'index' => '08',
            'name' => 'Charsley Digital',
            'client' => 'This site',
            'kicker' => 'This platform',
            'summary' => 'The public site, the enquiry desk, and the admin that follows up.',
            'status' => 'Live',
            'role' => 'Design, build, and host',
            'stack' => ['Laravel', 'Tailwind', 'MySQL', 'Docker'],
            'links' => [
                ['label' => 'Start a project', 'href' => '/#contact'],
            ],
            'story' => [
                [
                    'heading' => 'The job',
                    'body' => 'The studio needed a site that shows the work, and a place for an enquiry to land. A form that emails into the void is not a system. The lead has to be stored, notified, and waiting in an admin when someone sits down to reply.',
                ],
                [
                    'heading' => 'What it does',
                    'body' => 'This site. A discovery form with a consent checkbox and a spam check. New leads go to email and, when configured, a push notification. The admin lists them, holds notes, and keeps the mail settings in one screen.',
                ],
                [
                    'heading' => 'How it runs',
                    'body' => 'Laravel, MySQL, and Docker on dedicated hardware. Each client platform on the same server is its own set of containers. This one is the front door.',
                ],
            ],
        ],
    ],
];
