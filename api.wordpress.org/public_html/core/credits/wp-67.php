<?php

class WP_67_Credits extends WP_Credits {

	public function groups() {
		$groups = [
			'core-developers'         => [
				'name'    => 'Noteworthy Contributors',
				'type'    => 'titles',
				'shuffle' => false,
				'data'    => [
					'matt'                => [ 'Matt Mullenweg', 'Release Lead' ],
					'davidbaumwald'       => [ 'David Baumwald', 'Release Lead' ],
					'peterwilsoncc'       => [ 'Peter Wilson', 'Release Lead' ],
					'kirasong'            => [ 'Kira Schroder', 'Release Lead' ],
					'get_dave'            => 'David Smith',
					'kevin940726'         => 'Kai Hao',
					'noisysocks'          => 'Robert Anderson',
					'chaion07'            => 'Ahmed Kabir Chaion',
					'stoyangeorgiev'      => 'Stoyan Georgiev',
					'ndiego'              => 'Nick Diego',
					'colorful tones'      => 'Damon Cook',
					'fabiankaegy'         => 'Fabian Kägy',
					'faguni22'            => 'Mumtahina Faguni',
					'Ankit K Gupta'       => 'Ankit K. Gupta',
 					'Joen'                => 'Joen Asmussen',
					'mukesh27'            => 'Mukesh Panchal',
					'beafialho'           => 'Beatriz Fialho',
					'poena'               => 'Carolina Nymark',
					'juanfra'             => 'Juan Aldasoro',
					'matveb'              => 'Matias Ventura',
					'wildworks'           => 'Aki Hamano',
					'youknowriad'         => 'Riad Benguella',
					'Mamaduka'            => 'George Mamadashvili',
					'tyxla'               => 'Marin Atanasov',
					'mciampini'           => 'Marco Ciampini',
					'jameskoster'         => 'James Koster',
					'SergeyBiryukov'      => 'Sergey Biryukov',
					'0mirka00'            => 'Lena Morita',
					'ramonopoly'          => 'Ramon James',
					'ellatrix'            => 'Ella van Durpe',
					'richtabor'           => 'Rich Tabor',
					'dmsnell'             => 'Dennis Snell',
					'aaronrobertshaw'     => 'Aaron Robertshaw',
					'andrewserong'        => 'Andrew Serong',
					'talldanwp'           => 'Daniel Richards',
					'jorbin'              => 'Aaron Jorbin',
				],
			],
			'contributing-developers' => [
				'name'    => false,
				'type'    => 'titles',
				'shuffle' => true,
				'data'    => [
					'ntsekouras'          => 'Nik Tsekouras',
					'jonsurrell'          => 'Jon Surrell',
					'gziolo'              => 'Greg Ziółkowski',
					'sabernhardt'         => 'Stephen Bernhardt',
					'santosguillamot'     => 'Mario Santos',
					'desrosj'             => 'Jonathan Desrosiers',
					'jorgefilipecosta'    => 'Jorge Costa',
					'afercia'             => 'Andrea Fercia',
					'cbravobernal'        => 'Carlos Bravo',
					'swissspidy'          => 'Pascal Birchler',
					'oandregal'           => 'André Maneiro',
					'joedolson'           => 'Joe Dolson',
					'shailu25'            => 'Shail Mehta',
					'hellofromTonya'      => 'Tonya Mork',
					'karmatosed'          => 'Tammie Lister',
					'annezazu'            => 'Anne McCarthy',
					'jsnajdr'             => 'Jarda Snajdr',
					'isabel_brison'       => 'Isabel Brison',
					'scruffian'           => 'Ben Dwyer',
					'jeryj'               => 'Jerry Jones',
					'jrf'                 => 'Juliette Reinders Folmer',
					'daniguardiola'       => 'Dani Guardiola',
					'sunil25393'          => 'Sunil Prajapati',
					'Bernhard Reiter'     => 'Bernhard Reiter',
					'presstoke'           => 'Mitchell Austin',
					'ajlende'             => 'Alex Lende',
					'onemaggie'           => 'Maggie Cabrera',
					'joemcgill'           => 'Joe McGill',
					'andraganescu'        => 'Andrei Draganescu',
					'czapla'              => 'Michal Czaplinski',
					'amitraj2203'         => 'Amit Raj',
					'flixos90'            => 'Felix Arntz',
					'audrasjb'            => 'Jean-Baptiste Audras',
				],
			],
		];

		return $groups;
	}

	public function props() {
		return [
			'0mirka00',
			'369work',
			'75thtrombone',
			'aaronrobertshaw',
			'aatanasov',
			'ababir',
			'abcd95',
			'abcsun',
			'abhi3315',
			'acafourek',
			'adamkheckler',
			'adamsilverstein',
			'adamwood',
			'adarshposimyth',
			'adrian2k7',
			'aduth',
			'afercia',
			'afragen',
			'ahmarzaidi',
			'ahortin',
			'ahsankhan316',
			'ajitbohra',
			'ajlende',
			'akashdhawade',
			'akshat2802',
			'alaminfirdows',
			'alanfuller',
			'albigdd',
			'alessandrotesoro',
			'alex27',
			'alexandrebuffet',
			'alexcu21',
			'alexstine',
			'ali7ali',
			'aliaghdam',
			'aljullu',
			'alshakero',
			'alvitazwar052',
			'ambrosiawt',
			'amincharoliya',
			'amirthepiper',
			'amitraj2203',
			'amjadr360',
			'andergmartins',
			'andraganescu',
			'andreiglingeanu',
			'andrewhayward',
			'andrewserong',
			'aniketpatel',
			'ankit-k-gupta',
			'ankitkumarshah',
			'annezazu',
			'ant1busted',
			'anthakkar08',
			'antoniosejas',
			'antonvlasenko',
			'antpb',
			'anveshika',
			'apermo',
			'apmeyer',
			'areziaal',
			'aristath',
			'arkenon',
			'armandsdz',
			'arnaudbroes',
			'artemiosans',
			'arthur791004',
			'arypneta',
			'asafm7',
			'aslamdoctor',
			'assassinateur',
			'atachibana',
			'audrasjb',
			'aware',
			'awetz583',
			'ayeshrajans',
			'azaozz',
			'bacoords',
			'balub',
			'barryceelen',
			'bartkalisz',
			'beafialho',
			'beckej',
			'benjamin_zekavica',
			'benniledl',
			'benoitchantre',
			'bernhard-reiter',
			'berubenic',
			'beryldlg',
			'bgardner',
			'bgosnell',
			'bhaveshdesai13',
			'bijit027',
			'bjerke-johannessen',
			'bjorsch',
			'blindmikey',
			'bluantinoo',
			'bobbyleenoblestudios',
			'bogdannikolic',
			'boniu91',
			'bph',
			'bradley2083',
			'brentjettgmailcom',
			'brettshumaker',
			'brianhenryie',
			'bridgetwes',
			'brobken',
			'butterflymedia',
			'cambabutonono',
			'carlosgprim',
			'carstenbach',
			'cbirdsong',
			'cbravobernal',
			'celloexpressions',
			'cfinke',
			'chaion07',
			'chanthaboune',
			'charleslf',
			'cheffheid',
			'chrico',
			'circlecube',
			'ckanitz',
			'clorith',
			'codersantosh',
			'coffee2code',
			'collet',
			'colorful-tones',
			'coquardcyr',
			'coreyw',
			'costasovo',
			'costdev',
			'courane01',
			'cpal',
			'craynor',
			'creativethemeshq',
			'crixu',
			'cu121',
			'cweiske',
			'cwhitmore',
			'cyberorca',
			'cybr',
			'czapla',
			'd-signed',
			'da5f656f',
			'daleharrison',
			'daniguardiola',
			'dannyreaktiv',
			'darerodz',
			'darshitrajyaguru97',
			'daveagp',
			'davidabowman',
			'davidbaumwald',
			'davidbinda',
			'davidgodleman10up',
			'davidhbrown',
			'daviedr',
			'dballari',
			'dd32',
			'ddewan',
			'debarghyabanerjee',
			'deepakrohilla',
			'deepakvijayan',
			'dekadinious',
			'deryck',
			'designsimply',
			'desrosj',
			'devansh2002',
			'devmuhib',
			'devspace',
			'devtanbir',
			'dhananjaykuber',
			'dharm1025',
			'dhenriet',
			'dhewercorus',
			'dhrumilk',
			'dhruval04',
			'dhruvang21',
			'digitalex11',
			'dilip2615',
			'dilipbheda',
			'dimplemodi',
			'divibanks',
			'djcowan',
			'djennez',
			'dlh',
			'dmsnell',
			'domainsupport',
			'dooperweb',
			'dorzki',
			'dpcalhoun',
			'drewapicture',
			'drivingralle',
			'drjosh07',
			'drzraf',
			'dsas',
			'dshanske',
			'dsmart',
			'eatse',
			'eballeste',
			'eclare',
			'eclev91',
			'edithlb',
			'eherman24',
			'eidolonnight',
			'ejnwebmaster',
			'elbsegler',
			'elfu98',
			'eliorivero',
			'ellatrix',
			'elrae',
			'emmanuel78',
			'engahmeds3ed',
			'ericdye',
			'erichmond',
			'erikiva',
			'erikyo',
			'eroan',
			'euthelup',
			'fabiankaegy',
			'fabiorubioglio',
			'fac3less',
			'faguni22',
			'fahimmurshed',
			'faisal03',
			'faisalahammad',
			'fayyazfayzi',
			'fazyshah',
			'fcoveram',
			'ffffelix',
			'fierevere',
			'finalwebsites',
			'finntown',
			'firewatch',
			'firoz2456',
			'fitehal',
			'fjorgemota',
			'flixos90',
			'franz00',
			'freibergergarcia',
			'fullofcaffeine',
			'fullworks',
			'gansbrest',
			'garethelwell',
			'garrett-eclipse',
			'gauravsingh7',
			'gauravtiwari',
			'geekofshire',
			'georgwordpress',
			'geriux',
			'germanfrelo',
			'get_dave',
			'ghorivipul97',
			'gigitux',
			'glynnquelch',
			'gmariani405',
			'gohelkunjan',
			'graemef',
			'grantmkin',
			'greenshady',
			'greentreefrog',
			'greenworld',
			'gwallace87',
			'gyurmey',
			'gziolo',
			'h71',
			'hage',
			'halilesen',
			'hanneslsm',
			'hardipparmar',
			'hareesh-pillai',
			'harlet7',
			'harshalkadu',
			'harshgajipara',
			'harshvaishnav',
			'hazdiego',
			'hbhalodia',
			'hectorjarquin',
			'hedgefield',
			'helen',
			'hellofromtonya',
			'hirschferkel',
			'hjklemenz',
			'hmbashar',
			'hrkhal',
			'htmgarcia',
			'huubl',
			'huzaifaalmesbah',
			'iamarinoh',
			'iamfarhan09',
			'iamjaydip',
			'iammehedi1',
			'iamtakashi',
			'ibrahimriaz',
			'igreenie',
			'ikamal',
			'im3dabasia1',
			'imranh920',
			'imrraaj',
			'indirabiswas27',
			'ipajen',
			'ironprogrammer',
			'isabel_brison',
			'isaeedam',
			'istiaqhossain',
			'itapress',
			'itpathsolutions',
			'itsdanny',
			'ivanottinger',
			'iworks',
			'jacobcassidy',
			'jagirbahesh',
			'jainil07',
			'jameskoster',
			'jamesosborne',
			'jamesros161',
			'janak007',
			'jannathsyeda',
			'janpfeil',
			'jarekmorawski',
			'jasonbahl',
			'javad2000',
			'javiarce',
			'jawadwp',
			'jayadevankbh',
			'jazzs3quence',
			'jdahir0789',
			'jdy68',
			'jeffpaul',
			'jeherve',
			'jenilk',
			'jennifarhat',
			'jeremyfelt',
			'jeryj',
			'jetaldobariya1',
			'jffng',
			'jigar9998',
			'jimmyh61',
			'joedolson',
			'joehoyle',
			'joemcgill',
			'joemoto',
			'joen',
			'johnbillion',
			'johnillo',
			'johnjamesjacoby',
			'johnny5',
			'johnregan3',
			'johnstonphilip',
			'jonnywatersbb',
			'jonsurrell',
			'jorbin',
			'jordesign',
			'jorgefilipecosta',
			'josevarghese',
			'josklever',
			'jossnaz',
			'jpstevens',
			'jrf',
			'jsnajdr',
			'jtgreyd',
			'juanfra',
			'juanmaguitar',
			'julianoe',
			'juliemoynat',
			'juliobox',
			'junedsabaliya',
			'justlevine',
			'jwgoedert',
			'jzern',
			'kaavyaiyer',
			'kadamwhite',
			'kafleg',
			'kajalgohel',
			'kamran8176',
			'karan4word',
			'kardi420',
			'karmatosed',
			'karolmanijak',
			'kartik-suthar',
			'kartikmehta',
			'kau-boy',
			'kbrownkd',
			'kebbet',
			'keffr3n',
			'kel-dc',
			'kellenmace',
			'keoshi',
			'kevin940726',
			'kevinb',
			'kevinswalsh',
			'khokansardar',
			'kimclow',
			'kirasong',
			'kishanjasani',
			'kisquian',
			'kittmedia',
			'kjellr',
			'kkmuffme',
			'kmadhak',
			'knutsp',
			'kowsar89',
			'kracked888',
			'kraftbj',
			'kraftner',
			'krishneup',
			'kristastevens',
			'kristincodeswp',
			'krokodok',
			'krupajnanda',
			'krupalpanchal',
			'ktaron',
			'kurtpayne',
			'kushang78',
			'kuuuzya',
			'la-geek',
			'laranz',
			'lastsplash',
			'laurelfulford',
			'leecollings',
			'leemon',
			'lgladdy',
			'lifelightweb',
			'linsoftware',
			'liviopv',
			'lonelyvegan',
			'looswebstudio',
			'lopo',
			'louiswol94',
			'louwie17',
			'lovesoni1999',
			'luisherranz',
			'lukasbesch',
			'lukecarbis',
			'lumiblog',
			'luminuu',
			'lwangaman',
			'madhudollu',
			'madpeter',
			'madtownlems',
			'mai21',
			'mamaduka',
			'manbo',
			'maneshtimilsina',
			'manooweb',
			'manzoorwanijk',
			'marc4',
			'marcwieland95',
			'mardroid',
			'margolisj',
			'marianguas',
			'mariayohana',
			'marius84',
			'mark-k',
			'markhowellsmead',
			'markoserb',
			'markparnell',
			'martinkrcho',
			'marybaum',
			'mat_',
			'matteoenna',
			'mattormeeple',
			'mattraines',
			'mattyrob',
			'matveb',
			'maurodf',
			'mayanktripathi32',
			'mayur8991',
			'mboynes',
			'mchirag2002',
			'mciampini',
			'mcrisp1972',
			'mcsf',
			'mdviralsampat',
			'mdxfr',
			'megane9988',
			'mehulkaklotar',
			'melchoyce',
			'meteorlxy',
			'mfgmicha',
			'mhkuu',
			'mhshohel',
			'mi5t4n',
			'michaelbourne',
			'michaelpick',
			'michaelwp85',
			'mielbu',
			'miguelaxcar',
			'migueluy',
			'mikachan',
			'mikeb8s',
			'mikeybinns',
			'milamj',
			'milana_cap',
			'mklusak',
			'mkrndmane',
			'mlaetitia',
			'mleathem',
			'mlf20',
			'mmaattiiaass',
			'mmcalister',
			'mobarak',
			'mohitdadhich10',
			'morganestes',
			'mosescursor',
			'mosne',
			'mossy2100',
			'mr2p',
			'mreishus',
			'mrfoxtalbot',
			'mte90',
			'mujuonly',
			'mukesh27',
			'n8finch',
			'nadimcse',
			'naeemhaque',
			'nagpai',
			'narenin',
			'nareshbheda',
			'nateinaction',
			'ndiego',
			'nebojsajurcic',
			'nek285',
			'nekojonez',
			'nendeb55',
			'neo2k23',
			'neotrope',
			'neoxx',
			'nerrad',
			'newyorkerlaura',
			'nhrrob',
			'nick_thegeek',
			'nickbohle',
			'nicolefurlan',
			'nidhidhandhukiya',
			'nihar007',
			'nikitasolanki1812',
			'nirajgirixd',
			'niravsherasiya7707',
			'nithi22',
			'nithins53',
			'nmutua',
			'noahtallen',
			'noisysocks',
			'nomnom99',
			'noruzzaman',
			'notlaura',
			'nrqsnchz',
			'ntsekouras',
			'nurielmeni',
			'nyiriland',
			'oandregal',
			'obliviousharmony',
			'obrienlabs',
			'oglekler',
			'olivierlafleur',
			'oncecoupled',
			'onemaggie',
			'oscarhugopaz',
			'otakupahp',
			'paaljoachim',
			'pablohoneyhoney',
			'pamprn',
			'pander',
			'paragoninitiativeenterprises',
			'parinpanjari',
			'parthvataliya',
			'patricia70',
			'paulcline',
			'paulkevan',
			'paulopmt1',
			'paulschreiber',
			'paulwilde',
			'pavanpatil1',
			'pbearne',
			'pbiron',
			'pcarvalho',
			'pedromendonca',
			'pento',
			'pereirinha',
			'perezcarreno',
			'perryrylance',
			'peterwilsoncc',
			'petitphp',
			'pevogam',
			'pgeorgiev',
			'philwebs',
			'pitamdey',
			'plaidharper',
			'plari',
			'pls78',
			'poena',
			'pooja1210',
			'pooja9712',
			'porg',
			'ppolo99',
			'praful2111',
			'pranitdugad',
			'pratikkry',
			'pratiklondhe',
			'presskopp',
			'presstoke',
			'prestonwordsworth',
			'prettyboymp',
			'priethor',
			'prionkor',
			'provenself',
			'psykro',
			'pwtyler',
			'quadthemes',
			'rachelbaker',
			'rafaelgalani',
			'rafiq91',
			'rahmatgumilar',
			'rahmohn',
			'rahulharpal',
			'rainbowgeek',
			'rajinsharwar',
			'ralessio',
			'ramon-fincken',
			'ramonopoly',
			'ramswarup',
			'rarst',
			'ravigadhiyawp',
			'rayhatron',
			'rcneil',
			'rcorrales',
			'rcrayno',
			'rcreators',
			'realthemes',
			'rejaulalomkhan',
			'renathoc',
			'reputeinfosystems',
			'retrofox',
			'rfischmann',
			'rghedin',
			'rhellewellgmailcom',
			'richtabor',
			'riddhipatel',
			'rishishah',
			'rishit30g',
			'rithik56',
			'ritterml',
			'rleeson',
			'robert-biswas',
			'robertghetau',
			'rocketworks',
			'rodelgc',
			'rodrigosprimo',
			'rohitmathur7',
			'room34',
			'roygbyte',
			'royho',
			'roytanck',
			'rpf5573',
			'rslee',
			'ruchirj',
			'rudlinkon',
			'ryan',
			'ryancurban',
			'ryelle',
			'ryokuhi',
			'sabernhardt',
			'sadmansh',
			'sahiladit',
			'sailpete',
			'sainathpoojary',
			'sakibmd',
			'samiamnot',
			'samtoohey93',
			'samuelsidler',
			'samuelsilvapt',
			'sannevndrmeulen',
			'santosguillamot',
			'sarahricker',
			'sarthaknagoshe2002',
			'sathyapulse',
			'satishprajapati',
			'sauliusv',
			'saxonafletcher',
			'sayedulsayem',
			'sc0ttkclark',
			'scholdstrom',
			'scottculverhouse',
			'scruffian',
			'seanavers',
			'sebastienserre',
			'seifradwane',
			'sergeybiryukov',
			'sergiomdgomes',
			'severinepozzo',
			'sfougnier',
			'sh4lin',
			'shail-mehta',
			'shailu25',
			'shanemuir',
			'sharonaustin',
			'shashwatahalder01',
			'sheulyshila',
			'shilu25',
			'showravhasan',
			'shreya0204',
			'silaskoehler',
			'siliconforks',
			'simison',
			'simo_m',
			'siobhyb',
			'sippis',
			'sirlouen',
			'skobe',
			'skorasaurus',
			'smerriman',
			'smithjw1',
			'smrubenstein',
			'snehapatil02',
			'soean',
			'sophiegy',
			'souptik',
			'sourabhjain',
			'sourav08',
			'spacedmonkey',
			'spanglishwebs',
			'spdft',
			'sppramodh',
			'staurand',
			'stein2nd',
			'stevenlinx',
			'stimul',
			'stoyangeorgiev',
			'styleshit',
			'sudipatel007',
			'sukhendu2002',
			'sumitbagthariya16',
			'sumitsingh',
			'sunil25393',
			'superchlorine',
			'swb1192',
			'swissspidy',
			'szepeviktor',
			'tacoverdo',
			'takahashi_fumiki',
			'talldanwp',
			'tanvirul',
			'targz-1',
			'taylorgorman',
			'tdrayson',
			'the-ank',
			'thekt12',
			'thelmachido',
			'themes-1',
			'thomasdevisser',
			'thompsonsj',
			'thrijith',
			'tigriweb',
			'timothyblynjacobs',
			'timwhitlock',
			'tirth03',
			'tjnowell',
			'tmanoilov',
			'toastercookie',
			'tobiasbg',
			'tobifjellner',
			'tomhine',
			'tomjcafferkey',
			'tomllobet',
			'topdownjimmy',
			'toro_unit',
			'tropicalista',
			'truptikanzariya',
			'tunetheweb',
			'tw2113',
			'twstokes',
			'twvania',
			'tyrannous',
			'tyxla',
			'ugyensupport',
			'ukdrahul',
			'umesh84',
			'umeshsinghin',
			'up1512001',
			'valer1e',
			'vcanales',
			'vertisoft',
			'veryard',
			'verygoode',
			'vijaysinh9094',
			'vineet2003',
			'vipulgupta003',
			'vipulpatil',
			'viralsampat',
			'voboghure',
			'vrajadas',
			'vrishabhsk',
			'wbdv',
			'webcommsat',
			'webmandesign',
			'webwurm',
			'welcher',
			'wesrapyd',
			'westonruter',
			'wido',
			'wildworks',
			'williamalexander',
			'williampatton',
			'wonderboymusic',
			'wongjn',
			'wpeople',
			'wpnoman0',
			'wpsoul',
			'wzieba',
			'xendo',
			'xipasduarte',
			'xknown',
			'xyulex',
			'yaniiliev',
			'yguyon',
			'yogeshbhutkar',
			'youknowriad',
			'yowangdu',
			'ytfeldrawkcab',
			'yukinobu',
			'yuvrajsinh2211',
			'zackkrida',
			'zaguiini',
			'zahardoc',
			'zargarov',
			'zeelthakkar',
			'zieladam',
			'zitaruksergij',
			'zodiac1978',
			'zunaid321',
		];
	}

	public function external_libraries() {
		return [
			[ 'Babel Polyfill', 'https://babeljs.io/docs/en/babel-polyfill' ],
			[ 'Backbone.js', 'https://backbonejs.org/' ],
			[ 'Class POP3', 'https://squirrelmail.org/' ],
			[ 'clipboard.js', 'https://clipboardjs.com/' ],
			[ 'Closest', 'https://github.com/jonathantneal/closest' ],
			[ 'CodeMirror', 'https://codemirror.net/' ],
			[ 'Color Animations', 'https://plugins.jquery.com/color/' ],
			[ 'getID3()', 'https://www.getid3.org/' ],
			[ 'FormData', 'https://github.com/jimmywarting/FormData' ],
			[ 'Horde Text Diff', 'https://pear.horde.org/' ],
			[ 'hoverIntent', 'https://github.com/briancherne/jquery-hoverIntent' ],
			[ 'imgAreaSelect', 'https://github.com/odyniec/imgareaselect' ],
			[ 'Iris', 'https://github.com/Automattic/Iris' ],
			[ 'jQuery', 'https://jquery.com/' ],
			[ 'jQuery UI', 'https://jqueryui.com/' ],
			[ 'jQuery Hotkeys', 'https://github.com/tzuryby/jquery.hotkeys' ],
			[ 'jQuery serializeObject', 'https://benalman.com/projects/jquery-misc-plugins/' ],
			[ 'jQuery.query', 'https://plugins.jquery.com/query-object/' ],
			[ 'jQuery.suggest', 'https://github.com/pvulgaris/jquery.suggest' ],
			[ 'jQuery UI Touch Punch', 'https://github.com/furf/jquery-ui-touch-punch' ],
			[ 'json2', 'https://github.com/douglascrockford/JSON-js' ],
			[ 'LibFont', 'https://github.com/Pomax/lib-font' ],
			[ 'Lodash', 'https://lodash.com/' ],
			[ 'Masonry', 'https://masonry.desandro.com/' ],
			[ 'MediaElement.js', 'https://www.mediaelementjs.com/' ],
			[ 'Moment', 'https://momentjs.com/' ],
			[ 'PclZip', 'https://www.phpconcept.net/' ],
			[ 'PemFTP', 'https://www.phpclasses.org/package/1743-PHP-FTP-client-in-pure-PHP.html' ],
			[ 'phpass', 'https://www.openwall.com/phpass/' ],
			[ 'PHPMailer', 'https://github.com/PHPMailer/PHPMailer' ],
			[ 'Plupload', 'https://www.plupload.com/' ],
			[ 'random_compat', 'https://github.com/paragonie/random_compat' ],
			[ 'React', 'https://reactjs.org/' ],
			[ 'Redux', 'https://redux.js.org/' ],
			[ 'Requests', 'https://requests.ryanmccue.info/' ],
			[ 'SimplePie', 'https://simplepie.org/' ],
			[ 'The Incutio XML-RPC Library', 'https://code.google.com/archive/p/php-ixr/' ],
			[ 'Thickbox', 'https://codylindley.com/thickbox/' ],
			[ 'TinyMCE', 'https://www.tinymce.com/' ],
			[ 'Twemoji', 'https://github.com/twitter/twemoji' ],
			[ 'Underscore.js', 'https://underscorejs.org/' ],
			[ 'whatwg-fetch', 'https://github.com/github/fetch' ],
			[ 'zxcvbn', 'https://github.com/dropbox/zxcvbn' ],
		];
	}
}

