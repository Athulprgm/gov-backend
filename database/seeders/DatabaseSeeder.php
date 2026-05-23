<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\District;
use App\Models\Project;
use App\Models\TimelineMilestone;
use App\Models\CitizenTestimonial;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed default Admin User
        User::updateOrCreate(
            ['email' => 'admin@janavikasam.gov.in'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]
        );

        // 2. Seed Districts
        $districts = [
            [
                'id' => 'kasaragod',
                'name_en' => 'Kasaragod',
                'name_ml' => 'കാസർഗോഡ്',
                'investment' => '₹340 Cr',
                'projects_count' => 8,
                'highlight_ml' => 'മലയോര ഹൈവേ ഒന്നാം ഘട്ടം പൂർത്തിയായി',
                'highlight_en' => 'Hill Highway Phase 1 Completed',
                'x' => 80,
                'y' => 80,
            ],
            [
                'id' => 'kannur',
                'name_en' => 'Kannur',
                'name_ml' => 'കണ്ണൂർ',
                'investment' => '₹820 Cr',
                'projects_count' => 15,
                'highlight_ml' => 'അന്താരാഷ്ട്ര നിലവാരമുള്ള നഗര പാതകൾ',
                'highlight_en' => 'International Standard City Roads',
                'x' => 100,
                'y' => 140,
            ],
            [
                'id' => 'wayanad',
                'name_en' => 'Wayanad',
                'name_ml' => 'വയനാട്',
                'investment' => '₹290 Cr',
                'projects_count' => 6,
                'highlight_ml' => 'തുരങ്കപ്പാത നിർമാണത്തിന്റെ തുടക്കം',
                'highlight_en' => 'Anakkampoyil-Meppadi Tunnel Road Init',
                'x' => 160,
                'y' => 160,
            ],
            [
                'id' => 'kozhikode',
                'name_en' => 'Kozhikode',
                'name_ml' => 'കോഴിക്കോട്',
                'investment' => '₹710 Cr',
                'projects_count' => 12,
                'highlight_ml' => 'കോഴിക്കോട് ബൈപാസ് 6 വരി പാതയായി വികസിപ്പിച്ചു',
                'highlight_en' => 'Kozhikode Bypass 6-Lane Upgrade',
                'x' => 120,
                'y' => 200,
            ],
            [
                'id' => 'malappuram',
                'name_en' => 'Malappuram',
                'name_ml' => 'മലപ്പുറം',
                'investment' => '₹650 Cr',
                'projects_count' => 11,
                'highlight_ml' => 'ദേശീയപാത 66 വികസനം ദ്രുതഗതിയിൽ',
                'highlight_en' => 'NH 66 Expansion Running Smoothly',
                'x' => 160,
                'y' => 240,
            ],
            [
                'id' => 'palakkad',
                'name_en' => 'Palakkad',
                'name_ml' => 'പാലക്കാട്',
                'investment' => '₹520 Cr',
                'projects_count' => 10,
                'highlight_ml' => 'വ്യവസായ പാർക്ക് വികസനം',
                'highlight_en' => 'Palakkad Mega Food Park & Industrial Corridor',
                'x' => 210,
                'y' => 260,
            ],
            [
                'id' => 'thrissur',
                'name_en' => 'Thrissur',
                'name_ml' => 'തൃശ്ശൂർ',
                'investment' => '₹680 Cr',
                'projects_count' => 14,
                'highlight_ml' => 'ശക്തൻ മാർക്കറ്റ് സ്മാർട്ട് നവീകരണം',
                'highlight_en' => 'Sakthan Market Smart Modernization',
                'x' => 170,
                'y' => 310,
            ],
            [
                'id' => 'ernakulam',
                'name_en' => 'Ernakulam',
                'name_ml' => 'എറണാകുളം',
                'investment' => '₹1,850 Cr',
                'projects_count' => 22,
                'highlight_ml' => 'കൊച്ചി വാട്ടർ മെട്രോ പുതിയ ടെർമിനലുകൾ',
                'highlight_en' => 'Kochi Water Metro Expansion',
                'x' => 170,
                'y' => 370,
            ],
            [
                'id' => 'idukki',
                'name_en' => 'Idukki',
                'name_ml' => 'ഇടുക്കി',
                'investment' => '₹410 Cr',
                'projects_count' => 9,
                'highlight_ml' => 'മൂന്നാർ റോഡ് വികസന പദ്ധതി',
                'highlight_en' => 'Munnar Scenic Highway Redevelopment',
                'x' => 240,
                'y' => 390,
            ],
            [
                'id' => 'kottayam',
                'name_en' => 'Kottayam',
                'name_ml' => 'കോട്ടയം',
                'investment' => '₹480 Cr',
                'projects_count' => 11,
                'highlight_ml' => 'റബ്ബർ പാർക്ക് വികസന പ്രവർത്തനങ്ങൾ',
                'highlight_en' => 'Kottayam Rubber Park Expansion',
                'x' => 200,
                'y' => 430,
            ],
            [
                'id' => 'alappuzha',
                'name_en' => 'Alappuzha',
                'name_ml' => 'ആലപ്പുഴ',
                'investment' => '₹590 Cr',
                'projects_count' => 12,
                'highlight_ml' => 'ആലപ്പുഴ ബൈപാസ് സ്മാർട്ട് ലൈറ്റിംഗ്',
                'highlight_en' => 'Alappuzha Bypass Smart LED & Beautification',
                'x' => 170,
                'y' => 460,
            ],
            [
                'id' => 'pathanamthitta',
                'name_en' => 'Pathanamthitta',
                'name_ml' => 'പത്തനംതിട്ട',
                'investment' => '₹310 Cr',
                'projects_count' => 7,
                'highlight_ml' => 'ശബരിമല റോഡുകളുടെ അത്യാധുനിക ടാറിങ്',
                'highlight_en' => 'Sabarimala Roads BM&BC Tarring',
                'x' => 220,
                'y' => 490,
            ],
            [
                'id' => 'kollam',
                'name_en' => 'Kollam',
                'name_ml' => 'കൊല്ലം',
                'investment' => '₹620 Cr',
                'projects_count' => 13,
                'highlight_ml' => 'കൊല്ലം തുറമുഖം നവീകരണം',
                'highlight_en' => 'Kollam Port Infrastructure Upgrade',
                'x' => 200,
                'y' => 530,
            ],
            [
                'id' => 'trivandrum',
                'name_en' => 'Thiruvananthapuram',
                'name_ml' => 'തിരുവനന്തപുരം',
                'investment' => '₹1,450 Cr',
                'projects_count' => 20,
                'highlight_ml' => 'ഡിജിറ്റൽ സയൻസ് പാർക്ക് നിർമ്മാണം',
                'highlight_en' => 'Digital Science Park Execution',
                'x' => 230,
                'y' => 590,
            ],
        ];

        foreach ($districts as $d) {
            District::updateOrCreate(['id' => $d['id']], $d);
        }

        // 3. Seed Projects
        $projects = [
            [
                'id' => 'road-dev',
                'category_ml' => 'റോഡ് വികസനം',
                'category_en' => 'Road Development',
                'title_ml' => 'ദേശീയപാത 66 വികസനം (NH-66)',
                'title_en' => 'National Highway 66 Six-Lane Expansion',
                'district_ml' => 'കാസർഗോഡ് മുതൽ തിരുവനന്തപുരം വരെ',
                'district_en' => 'Kasaragod to Thiruvananthapuram',
                'description_ml' => 'കേരളത്തിന്റെ വടക്കേ അറ്റം മുതൽ തെക്കേ അറ്റം വരെയുള്ള യാത്ര സുഗമമാക്കുന്ന 6 വരി അന്താരാഷ്ട്ര ഹൈവേ നിർമ്മാണം.',
                'description_en' => 'Construction of a 6-lane international standard highway connecting the northernmost and southernmost tips of Kerala.',
                'investment' => '₹25,000 Cr+',
                'percentage' => 95,
                'before_text_ml' => 'വാഗ്ദാനം (2021): ഇടുങ്ങിയ 2-വരി പാതകൾ, കനത്ത ഗതാഗതക്കുരുക്ക്, വർദ്ധിച്ച യാത്രാസമയം.',
                'before_text_en' => 'Promise (2021): Narrow 2-lane roads, heavy traffic congestion, high travel times.',
                'after_text_ml' => 'യാഥാർത്ഥ്യം (2026): സുരക്ഷിതമായ 6-വരി റൺവേ, ആധുനിക സർവീസ് റോഡുകൾ, ഫ്ലൈ ഓവറുകൾ, കുറഞ്ഞ യാത്രാസമയം.',
                'after_text_en' => 'Reality (2026): Safe 6-lane bypasses, modern service roads, high-speed flyovers, drastically cut travel times.',
                'before_img' => 'https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?auto=format&fit=crop&w=800&q=80',
                'after_img' => 'https://images.unsplash.com/photo-1518495973542-4542c06a5843?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'bridge-const',
                'category_ml' => 'പാലങ്ങൾ',
                'category_en' => 'Bridges',
                'title_ml' => 'കോഴിക്കോട് ബൈപാസ് മാതൃകാ പാലങ്ങൾ',
                'title_en' => 'Kozhikode Bypass Bridge Mega Project',
                'district_ml' => 'കോഴിക്കോട്',
                'district_en' => 'Kozhikode',
                'description_ml' => 'യാത്രാസമയം മൂന്നിലൊന്നായി കുറയ്ക്കുന്ന കോഴിക്കോട് ബൈപാസിലെ 6 വരി പാലങ്ങളുടെ നിർമ്മാണം.',
                'description_en' => 'Construction of massive 6-lane bridges along the Kozhikode bypass to reduce traffic congestion.',
                'investment' => '₹1,200 Cr',
                'percentage' => 100,
                'before_text_ml' => 'വാഗ്ദാനം (2021): പഴയ ഇടുങ്ങിയ പാലം, മണിക്കൂറുകൾ നീളുന്ന ബ്ലോക്ക്.',
                'before_text_en' => 'Promise (2021): Aging narrow single-lane bridge, causing hours of gridlock daily.',
                'after_text_ml' => 'യാഥാർത്ഥ്യം (2026): നദിക്ക് കുറുകെ 6 വരികളിൽ അത്യാധുനിക കേബിൾ കണക്റ്റഡ് പാലം.',
                'after_text_en' => 'Reality (2026): Brand new state-of-the-art 6-lane concrete bridge spanning the river.',
                'before_img' => 'https://images.unsplash.com/photo-1447752875215-b2761acb3c5d?auto=format&fit=crop&w=800&q=80',
                'after_img' => 'https://images.unsplash.com/photo-1545624446-424e6c43d915?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'hospital-upgrade',
                'category_ml' => 'ആരോഗ്യ മേഖല',
                'category_en' => 'Healthcare',
                'title_ml' => 'കണ്ണൂർ മെഡിക്കൽ കോളേജ് സൂപ്പർ സ്പെഷ്യാലിറ്റി',
                'title_en' => 'Kannur Medical College Super Specialty Wing',
                'district_ml' => 'കണ്ണൂർ',
                'district_en' => 'Kannur',
                'description_ml' => 'ഉത്തര മലബാറിന് ആശ്വാസമായി അത്യാധുനിക മെഡിക്കൽ സൗകര്യങ്ങളും ഓങ്കോളജി ബ്ലോക്കുകളും സജ്ജീകരിച്ച ഹോസ്പിറ്റൽ.',
                'description_en' => 'Highly advanced medical wing with oncology, cardiology, and state-of-the-art trauma care for North Malabar.',
                'investment' => '₹450 Cr',
                'percentage' => 100,
                'before_text_ml' => 'വാഗ്ദാനം (2021): അടിസ്ഥാന കിടക്ക സൗകര്യങ്ങളുടെ കുറവ്, സൂപ്പർ സ്പെഷ്യാലിറ്റി ചികിത്സയ്ക്ക് ദൂരയാത്ര.',
                'before_text_en' => 'Promise (2021): Understaffed facilities, lack of advanced trauma care forcing travel to neighboring states.',
                'after_text_ml' => 'യാഥാർത്ഥ്യം (2026): 800+ കിടക്കകൾ, ലോകോത്തര ഓപ്പറേഷൻ തിയേറ്ററുകൾ, കാർഡിയാക് കെയർ യൂണിറ്റ്.',
                'after_text_en' => 'Reality (2026): World-class 800-bed facility, advanced robotic surgeries, and free cardiology services.',
                'before_img' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?auto=format&fit=crop&w=800&q=80',
                'after_img' => 'https://images.unsplash.com/photo-1586773860418-d3b3de97e663?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'school-mod',
                'category_ml' => 'പൊതുവിദ്യാഭ്യാസം',
                'category_en' => 'Education',
                'title_ml' => 'ഹൈടെക് സ്മാർട്ട് ക്ലാസ്സ്റൂം പദ്ധതി',
                'title_en' => 'Hi-Tech Government School Modernization',
                'district_ml' => 'എല്ലാ ജില്ലകളിലും',
                'district_en' => 'All Districts',
                'description_ml' => 'പൊതുവിദ്യാലയങ്ങളെ അന്താരാഷ്ട്ര നിലവാരത്തിലേക്ക് ഉയർത്തി സ്മാർട്ട് ക്ലാസ് റൂമുകളും ആധുനിക ലാബുകളും ഒരുക്കി.',
                'description_en' => 'Upgrading public schools to international standards with digital smartboards, science labs, and sports grounds.',
                'investment' => '₹850 Cr',
                'percentage' => 100,
                'before_text_ml' => 'വാഗ്ദാനം (2021): ചോർന്നൊലിക്കുന്ന കെട്ടിടങ്ങൾ, പഴയ ബ്ലാക്ക് ബോർഡുകൾ.',
                'before_text_en' => 'Promise (2021): Leaking classrooms, outdated blackboards, lack of computers or laboratory devices.',
                'after_text_ml' => 'യാഥാർത്ഥ്യം (2026): സ്മാർട്ട് പ്രൊജക്റ്ററുകൾ, റോബോട്ടിക് ലാബുകൾ, അത്യാധുനിക കായിക സൗകര്യങ്ങൾ.',
                'after_text_en' => 'Reality (2026): Fully air-conditioned digital smart classes, robotic labs, and turf playing fields.',
                'before_img' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?auto=format&fit=crop&w=800&q=80',
                'after_img' => 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?auto=format&fit=crop&w=800&q=80',
            ],
            [
                'id' => 'water-metro',
                'category_ml' => 'ഗതാഗതം / നവീകരണം',
                'category_en' => 'Urban Infrastructure',
                'title_ml' => 'കൊച്ചി വാട്ടർ മെട്രോ നെറ്റ്വർക്ക്',
                'title_en' => 'Kochi Water Metro Network',
                'district_ml' => 'എറണാകുളം',
                'district_en' => 'Ernakulam',
                'description_ml' => 'കൊച്ചിയിലെ ദ്വീപുകളെ തമ്മിൽ ബന്ധിപ്പിക്കുന്ന ഏഷ്യയിലെ ആദ്യത്തെ സംയോജിത വാട്ടർ മെട്രോ ഗതാഗത സംവിധാനം.',
                'description_en' => 'Asia\'s first integrated water metro transportation system connecting 10 islands around Kochi.',
                'investment' => '₹1,137 Cr',
                'percentage' => 100,
                'before_text_ml' => 'വാഗ്ദാനം (2021): ആശ്രയമറ്റ പഴയ ബോട്ട് സർവീസുകൾ, സുരക്ഷാ ആശങ്കകൾ.',
                'before_text_en' => 'Promise (2021): Unreliable, noisy wooden boats with high emissions and safety hazards.',
                'after_text_ml' => 'യാഥാർത്ഥ്യം (2026): വൈഫൈ സൗകര്യമുള്ള പരിസ്ഥിതി സൗഹൃദ എയർ കണ്ടീഷൻഡ് ഹൈബ്രിഡ് ഇലക്ട്രിക് കപ്പലുകൾ.',
                'after_text_en' => 'Reality (2026): Eco-friendly air-conditioned electric hybrid ferries with automated ticketing and fast wifi.',
                'before_img' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=800&q=80',
                'after_img' => 'https://images.unsplash.com/photo-1559136555-9303baea8ebd?auto=format&fit=crop&w=800&q=80',
            ],
        ];

        foreach ($projects as $p) {
            Project::updateOrCreate(['id' => $p['id']], $p);
        }

        // 4. Seed TimelineMilestones
        $milestones = [
            [
                'year' => '2021',
                'phase_ml' => 'പ്രഖ്യാപനം',
                'phase_en' => 'Declaration',
                'desc_ml' => 'ജനങ്ങളോടുള്ള വാഗ്ദാനങ്ങൾ പ്രകടനപത്രികയിലൂടെ പ്രഖ്യാപിച്ചു. 120-ലധികം വൻകിട പദ്ധതികളുടെ പദ്ധതി രേഖ തയ്യാറാക്കി.',
                'desc_en' => 'Promises declared to the citizens. Implementation outlines prepared for over 120 mega development projects.',
            ],
            [
                'year' => '2022',
                'phase_ml' => 'തുടക്കം',
                'phase_en' => 'Commencement',
                'desc_ml' => 'ഭൂമി ഏറ്റെടുക്കൽ നടപടികൾ പൂർത്തിയാക്കി അടിയന്തിര ഫണ്ടുകൾ അനുവദിച്ചു. ആദ്യ നിർമ്മാണ പ്രവർത്തനങ്ങൾക്ക് തറക്കല്ലിട്ടു.',
                'desc_en' => 'Land acquisition procedures completed and initial funds allocated. Groundbreaking ceremonies conducted.',
            ],
            [
                'year' => '2024',
                'phase_ml' => 'നിർമാണം',
                'phase_en' => 'Execution Peak',
                'desc_ml' => 'ദേശീയപാതയും വാട്ടർ മെട്രോയും ഉൾപ്പെടെയുള്ള പദ്ധതികൾ ദ്രുതഗതിയിലായി. 80 ശതമാനം നിർമാണവും റെക്കോർഡ് സമയത്ത് പൂർത്തിയായി.',
                'desc_en' => 'National Highways, water metro terminals, and hi-tech schools under rapid construction with 24/7 monitoring.',
            ],
            [
                'year' => '2026',
                'phase_ml' => 'പൂർത്തീകരണം',
                'phase_en' => 'Completion & Reality',
                'desc_ml' => 'വാഗ്ദാനങ്ങൾ യാഥാർത്ഥ്യമായി ജനങ്ങൾക്ക് സമർപ്പിച്ചു. നവകേരളത്തിന്റെ അടിസ്ഥാന സൗകര്യങ്ങൾ പൂർണ്ണ സജ്ജം.',
                'desc_en' => 'Promises delivered and opened to public. Infrastructure of new Kerala stands ready and operational.',
            ],
        ];

        foreach ($milestones as $m) {
            TimelineMilestone::updateOrCreate(
                ['year' => $m['year'], 'phase_en' => $m['phase_en']],
                $m
            );
        }

        // 5. Seed Testimonials
        $testimonials = [
            [
                'name' => 'രാധാമണി അമ്മ',
                'role' => 'കുടുംബശ്രീ പ്രവർത്തക, കണ്ണൂർ',
                'quote_ml' => 'അടിസ്ഥാന സൗകര്യങ്ങൾ വികസിച്ചതോടെ ഞങ്ങളുടെ യാത്രാ ബുദ്ധിമുട്ടുകൾ ഇല്ലാതായി. ആശുപത്രിയിൽ വേഗത്തിലെത്താൻ ഇപ്പോൾ സാധിക്കുന്നുണ്ട്. ഇത് വെറും പ്രഖ്യാപനമല്ല, നേരിൽ കാണുന്ന മാറ്റമാണ്.',
                'quote_en' => 'With infrastructure development, our travel struggles are gone. We can reach the hospital quickly now. This is not just a promise; it\'s a visible change.',
                'rating' => 5,
                'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?auto=format&fit=crop&w=150&q=80',
            ],
            [
                'name' => 'തോമസ് ജോസഫ്',
                'role' => 'ഐടി പ്രൊഫഷണൽ, തിരുവനന്തപുരം',
                'quote_ml' => 'ദേശീയപാത 6-വരിയാക്കിയതോടെ കൊച്ചിയിൽ നിന്ന് തിരുവനന്തപുരത്തേക്ക് ഉള്ള യാത്രാസമയം പകുതിയായി. പുതിയ സ്റ്റാർട്ടപ്പ് സംരംഭങ്ങൾക്ക് ഇത് പുതിയ വാതായനങ്ങൾ തുറക്കുന്നു.',
                'quote_en' => 'With the NH expanded to 6 lanes, the travel time from Kochi to Trivandrum has cut in half. This opens new gateways for technology startups.',
                'rating' => 5,
                'avatar' => 'https://images.unsplash.com/photo-1560250097-0b93528c311a?auto=format&fit=crop&w=150&q=80',
            ],
            [
                'name' => 'മുഹമ്മദ് അൻവർ',
                'role' => 'മത്സ്യത്തൊഴിലാളി, എറണാകുളം',
                'quote_ml' => 'വാട്ടർ മെട്രോ വന്നതോടെ ദ്വീപുകളിൽ നിന്നും നഗരത്തിലേക്ക് പോകാൻ ഇപ്പോൾ ബോട്ടുകൾക്ക് വേണ്ടി മണിക്കൂറുകളോളം കാത്തിരിക്കേണ്ടി വരുന്നില്ല. എസി ബോട്ടിൽ സുരക്ഷിതമായി പോവാം.',
                'quote_en' => 'Since the Water Metro started, we don\'t have to wait hours for ferries from the islands to the city. We can travel safely and comfortably in AC electric boats.',
                'rating' => 5,
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?auto=format&fit=crop&w=150&q=80',
            ],
        ];

        foreach ($testimonials as $t) {
            CitizenTestimonial::updateOrCreate(
                ['name' => $t['name'], 'role' => $t['role']],
                $t
            );
        }
    }
}
