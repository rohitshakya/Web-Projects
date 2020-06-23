<!--
 * Author : Rohit Shakya
 * Date   : June-2020
 * Editor : Sublime text
 * Local server: Xampp
 * Title : Blog posting site featuring with Weather and News report  
 * Version: v5.6
 -->

<?php
$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);
$data = json_decode($response);
$currentTime = time();
?>
        <div class="report-container">
        <h3><?php echo $data->name; ?> Weather Status</h3>
        <div class="time">
          <?php date_default_timezone_set('Asia/Kolkata'); ?>
            <div><?php echo date("l g:i a", $currentTime); ?></div>
            <div><?php echo date("jS F, Y",$currentTime); ?></div>
            <div><?php echo ucwords($data->weather[0]->description); ?></div>

        </div>
        <div class="weather-forecast">
            <img
                src="http://openweathermap.org/img/w/<?php echo $data->weather[0]->icon; ?>.png"
                class="weather-icon" /> Max: <?php echo $data->main->temp_max; ?>°C<span
                class="min-temperature"> Min: <?php echo $data->main->temp_min; ?>°C</span>
        </div>
        <div class="time">
            <div>Humidity: <?php echo $data->main->humidity; ?> %</div>
            <div>Wind: <?php echo $data->wind->speed; ?> km/h</div>
        </div>
    </div></strong>

    <script type="text/javascript">
  
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*Anarraycontainingallthecitynamesintheworld*/
var countries=["Ziro","Zaidpur","Zafarabad","Yerandwane","Yellapur","Yelbarga","Yelahanka","Yavatmal","Yarada","Yamunanagar","Yadgir","WestBengal","Bengaluru","Bangalore","Wellington","Washim","Warora","Wardha","Warangal","Wankaner","Wangjing","Walajapet","Wai","Wadi","Vyara","Vrindavan","Vizianagaram","Visnagar","Visavadar","Virpur","Virarajendrapet","Viraganur","Vinchia","Vilattikulam","Vikarabad","Vijayapuri","Vidisha","Vettaikkaranpudur","Verna","Vepagunta","Vengurla","Velur","Vejalpur","Vedaraniyam","Vattalkundu","Vasind","Vasai","Vartej","Varca","Odisha","Varanasi","Vaniyambadi","Vandalur","Valpoy","Vallam","Valavanur","Valangaiman","Vaikam","Vaghodia","Vadnagar","Vadippatti","VadakkuValliyur","uttukkuli","UttarPradesh","Uttamapalaiyam","Utran","Usehat","Uravakonda","Uppiliyapuram","UppalKalan","Unjha","Unhel","Una","un","Umri","Umred","Umarkot","Umaria","Ullal","Ukwa","Ujjain","Ujhani","Udumalaippettai","Udupi","Udgir","Udalguri","Udaipur","Udaipur","Ooty","Turuvekere","Tura","Tundla","Tumkur","Tuljapur","Tughlakabad","Tuensang","Thiruvananthapuram","Gurgaon","Gurugram","Trimulgherry","Tiruppur","Tripura","Thrissur","Tosham","Topchanchi","Tondi","Todaraisingh","Titron","Titagarh","Tisaiyanvilai","Cheyyar","Tiruvanmiyur","Tiruvalla","Tiruttangal","Tiruppuvanam","Tirupparangunram","Tirunelveli","Tirumala","Tirukkoyilur","Tiruchengode","Tiruchchendur","Tirodi","Tiptur","Tinnanur","Tindivanam","Tilhar","Tikamgarh","Tijara","Thiruvarur","Theog","Thasra","ThannaMandi","Thanesar","Thane","Thandla","Than","Thakurdwara","Tezpur","Teonthar","Teni","Tenali","Telhara","Tekkalakote","Tekanpur","Kanpur","Teghra","Tattayyangarpettai","TarnTaran","Tarapur","Taranagar","Taramangalam","Mangalore","Tarabha","Tanuku","Tankara","Tanda","Tanakpur","TamilNadu","TalwandiBhai","Talipparamba","Talgram","Taleigao","Talcher","Talaja","Taki","Nagpur","Takhatgarh","Tadpatri","Tadepalle","Susner","Surianwan","Surendranagar","Surat","Surajgarh","Suntikoppa","Sundarnagar","Sunam","Sulya","Sulur","Sultanpur","Sultanpur","Suchindram","Suar","Srivardhan","Srisailain","Sriperumbudur","Sringeri","Srinagar","SriMadhopur","Srikakulam","Soygaon","Soro","Sorada","Sopur","Songadh","Sonegaon","Sonari","Sonamukhi","Sompeta","Solim","Sojitra","Sohna","Sohagpur","Sodpur","Soalkuchi","Siwan","Sivakasi","Sivagiri","Siuri","Sitapur","Sitamarhi","SiswaBazar","Sirur","Siruguppa","Sirsi","Sirsaganj","Sirsa","Sironj","Sirmaur","Sirhind","Sira","Sinnar","Singur","Singoli","Singapperumalkovil","Siliguri","Sindi","Sindgi","Simga","Simauri","Silvassa","Silchar","Sikkim","SikandraRao","Sikandra","Sikandarabad","Sijua","Sihor","Sidhpura","Sidhauli","Siddhapur","Sibsagar","Shujalpur","Shrirampur","SravanaBelgola","Shoranur","Solapur","Shivpuri","Shirwal","Shirhatti","Shirdi","Shillong","Shikohabad","Shikarpur","Shertallai","Sherghati","Sheopur","Sheoganj","Shantipur","Shamaspur","Shamsabad","Shamgarh","Shajapur","Shahpura","Shahpura","Shahpur","Shahpur","Shahpur","Shahpur","Shahjahanpur","Shahi","Shahganj","Shahapur","Shahabad","Shahabad","Sewar","Serchhip","Seorinarayan","Seoni","Seondha","Sendhwa","Secunderabad","Sayalkudi","Savda","Savantvadi","Saurikh","Sathyamangalam","Sattur","Sathankulam","Satna","Satana","Sason","Sarwar","Sarkhej","Sarila","Sardulgarh","Sardarshahr","Sarangpur","Saraipali","Saraikela","Saraiakil","Sapatgram","Sanwer","Santoshpur","Sanquelim","Sankra","Sankeshwar","Sanguem","Sangola","Sangli","Sangareddi","Sandur","Sandi","Sanchor","Sanawad","Sanand","Samrala","Sambre","Sambhal","Samba","Samalkot","Samalka","Salur","Salon","Salem","Sakti","Sakit","Sairang","Sainthia","Sailana","Saifullahganj","Saidpur","Sahawar","Sahaspur","Saharanpur","Sagauli","Sagar","Safidon","Sadat","Sadalgi","Sachin","Sabrum","Sabarmati","Rusera","Ropar","Rudraprayag","Roorkee","Rohtak","Roha","Robertsonpet","Risod","Rishikesh","Richha","Rewari","Revelganj","Repalle","Renukut","Rengali","Rehti","Rehli","Razam","Rayagada","Rayachoti","Ray","Rawatsar","Raver","Ratlam","Rath","Ratangarh","Rasulabad","Rasipuram","RanirBazar","Ranikhet","Ranibennur","Rani","Rangia","Ranchi","Jharkhand","Chandigarh","Ranapur","Ramtek","Rampura","Rampura","Rampur","Ramnagar","Ramnagar","Ramnagar","Ramjibanpur","Ramgarh","Ramgarh","Rameswaram","Rambha","Ramapuram","RamanujGanj","Closepet","Rajura","Rajula","Rajpura","Rajpur","Raj-Nandgaon","Rajnagar","Rajkot","Rajgir","Rajgarh","Rajgarh","Rajaori","RajaSansi","Rajapur","Razampeta","Rajakhera","RaiwalaBara","Raisen","Raipur","Chhattisgarh","Raikot","Raigarh","Raichur","Rahuri","Rahimatpur","Raha","Raghunathpur","Rafiganj","Raebareli","Radhakund","Rabupura","Kollam","Quepem","Kasba","Puttur","Pushkar","Purwa","Puruliya","Purna","PuraRaghunathpur","Pupri","Jabalpur","Punjab","Pune","Punasa","Punahana","Pullambadi","Puliyangudi","Pulgaon","Puduvayal","Pudur","Pudukkottai","Pratapgarh","Pragpura","Porsa","Poonamalle","Ponneri","Ponnampet","Puducherry","Ponda","Pollachi","Pokaran","Pithoragarh","Pithapuram","Piro","Pirawa","Pipri","Piploda","Pipar","Pinjaur","Pinahat","Pilkhuwa","Pilibangan","Pihani","Phulpur","Phulbani","Phillaur","Phariha","Phaltan","Phalauda","Petlawad","Perur","Perumpavur","Periyapatti","Periyanayakkanpalaiyam","Peravurani","Peranamallur","Peraiyur","Penugonda","Pennagaram","Pendra","Pehowa","Howrah","Peddapalli","Payyannur","Pawai","Pauri","Patur","Pattukkottai","Patti","Patrasaer","Patnagarh","Patiali","Patiala","Pathri","Patharia","Pathardi","Pathanamthitta","Pataudi","Patan","Patan","Patamundai","Pasan","Parvatipuram","Partapur","Parola","Parnera","Parlakimidi","Mizoram","Parichha","Parbhani","Paraspur","Paramagudi","ParadipGarh","Papparappatti","Papanasam","Panvel","Pansemal","Panna","Panihati","Pandua","Pandhurna","Pandhana","Pandaria","Panara","Panagar","Paloncha","Palmaner","Pallipattu","Palle","Pallattur","Palladam","Paliyad","PaliaKalan","Pali","Palghat","Palera","Palasbari","Palanpur","Palamedu","Palakollu","Pakur","Paithan","PaharGanj","Padrauna","Padmanabhapuram","Padampur","Pachperwa","Pachmarhi","Osmanabad","Orchha","Orai","Omalur","Okha","Odugattur","Obra","Nuzvid","Nurpur","Numaligarh","NorthVanlaiphai","NorthGuwahati","Nongpoh","Nohar","Nizamabad","Niwari","Nirmali","Nipani","NeemkaThana","Nimaparha","Nilokheri","Nilanga","Nilgiri","Needamangalam","Nichlaul","NewDelhi","Neral","Nellore","Nelamangala","Nazira","Nayagarh","Nawanshahr","Nawalgarh","Nawada","Nawabganj","Nawabganj","Navelim","Navadwip","Naugachhia","Nattam","Nasrullahganj","Naspur","Nashik","Narwana","Narsingi","Narsimhapur","Narnaund","Nargund","Naregal","Narayangarh","Narayanavanam","Naraura","Narasingapuram","Narasaraopet","Narasannapeta","Naraina","Nanpara","Nanjangud","NangloiJat","Nangal","Nandurbar","Nandikotkur","Nandgaon","Nanauta","Namli","Nambutalai","Namakkal","Naliya","Nalgonda","Nalagarh","Naksalbari","Najibabad","Nainpur","Naihati","Nahorkatiya","Nagwa","Nagram","Nagothana","NaglaDhimar","Nagina","Nagda","Nagasari","Nagari","Nagar","Nagamangala","Naduvattam","Nadiad","Nadaun","Nabinagar","Mysore","Muzaffarnagar","Tiruchirappalli","Muttupet","Mussoorie","Mushabani","Murwara","Murtajapur","Mursan","Morinda","Murgud","Muragacha","Munnar","Monghyr","Mungaoli","Mundra","Mundgod","Multai","Mulgund","Muluppilagadu","Mul","Mukher","Muhammadabad","Muhammadabad","MughalSarai","Mudkhed","Mudhol","Muddebihal","Mubarakpur","Mothihari","Morwa","Morjim","Morbi","Moranha","Moradabad","Mokokchung","Moirang","Mohiuddinnagar","Mohanur","Mohanbari","Mogalrajapuram","Modasa","Misrikh","Mirzapur","Mirialguda","MiranpurKatra","Minjur","Milak","Mhasvad","Mettur","Mettuppalaiyam","Mendarda","Melur","Mehndawal","Mehekar","Meghalaya","Meerut","Medak","MayangImphal","Mawana","Mavelikara","Maur","Maudaha","Mau","Mattur","Mathura","Mataundh","Masinigudi","Mormugao","Mariani","Marhaura","Marandahalli","Marahra","Manwat","Manthani","Mansa","Manpur","Manpur","ManoharThana","Manoharpur","Mannarakkat","Mankapur","Majalgaon","Manjhanpur","Manjeri","Manikpur","Maniar","Mangrol","Manglaur","Mangan","Mangaldai","Mangalagiri","Mandya","Mandvi","Manipur","Mandleshwar","Mandi","Mandawar","Mandapeta","Mandalgarh","Mandal","Manchar","Manavalakurichi","Manasa","Manamadurai","Manali","Mamit","Malvan","Malpura","Malpur","Mallur","Mallapuram","Malkapur","Malakanagiri","MaliandMunjeri","MalerKotla","Malavalli","Malappuram","Maksi","Makhu","Majitha","Mairwa","Mainpuri","Ahmedabad","Mainaguri","Maihar","Mahwah","Mahuli","Mahroni","Maholi","Mahmudnagar","Mahishadal","Maheshwar","Mahendragarh","Mahe","Mahbubabad","Maharashtra","Maharajganj","Maharajgani","Mahalingpur","Mahaban","Maghar","Magadi","Madurai","Madukkarai","Chennai","MadhyaPradesh","Madhupur","Madhubani","Madhogarh","Madhipura","Maddur","Madanapalle","Machhlishahr","Macherla","Lunglei","Luharu","Lucknow","Lotwara","Lormi","Londa","Lonar","Loharu","Lohaghat","Lingsugur","Leteri","LawarKhas","Latur","Latehar","Lar","Lanja","Lalpur","Lalgudi","Lalganj","Lala","Lakshettipet","Lakhyabad","Lakhnadon","Lakhipur","Lakhimpur","Laharpur","Ladwa","LachhmangarhSikar","Kuzhithurai","Kuttalam","Kushtagi","Kushalgarh","Kurinjippadi","Kurduvadi","Kurandvad","Kanwar","Kunnamkulam","Kunigal","Kundgol","Kunda","Kumsi","Kumhari","Kumbakonam","Kulu","Kulpahar","Kulgam","Kukshi","Kuju","Kudal","Kud","Kuchaman","Krishnarajpet","Krishnagiri","Kozhikode","Kovur","Kovalam","Kotwa","Kottayam","Kottaiyur","Kotri","Kotputli","Kotkhai","KotisaKhan","Kothapet","KotBhai","Kotaparh","Kotagiri","Kota","Kosigi","Kosamba","Koregaon","Koratla","Koraput","Koradi","Kora","Koppa","Kopaganj","Konnagar","Kondotty","Kondalwadi","Konch","Konanur","Kolasib","Kolhapur","Kolar","Colachel","Kohima","Kodungallur","Kodoli","Kodinar","Kodarma","Kodala","Kuchinda","Koath","Kithor","Kishni","Kishangarh","Kishanganj","Kiratpur","Kiranur","Kirakat","Kilvelur","Khutar","Khurja","Khurasa","Khunti","Khujner","Khowai","Khonsa","Khilchipur","Khetri","Kheri","Kheradi","Khekra","Kheda","Khed","Khaur","Khatima","Khatauli","Kharsia","Kharod","Kharkhauda","Khargupur","Khargapur","Khardah","Kharar","Kharagpur","Khapri","Khanpur","Khanna","Khandsa","Khanapur","Khamharia","Khambhat","Khamaria","Khallikot","Visakhapatnam","Patna","KhajurahoGroupofMonuments","Khairagarh","Khair","Khagaul","Khaga","Khada","Kesinga","Keshod","Kerala","Kenduadih","Kenda","Kelwa","Kekri","Kayankulam","Kawardha","Kaveripatnam","Kavali","Kattivakkam","Katra","Katpur","Katoya","Katihar","Kathua","Kathara","Katangi","Kasrawad","Kasganj","Kasaragod","Karwar","Karumbakkam","Karsiyang","Karnataka","Karmala","Karjat","Karimpur","Karimganj","Kargil","Kareli","Karauli","Karari","Karamsad","Karamadai","Karaikal","Kapurthala","Kapren","Kapadvanj","Kanth","Kant","Kanota","Kanodar","Kanniyakumari","Kannangad","Kankon","Kanker","Kankauli","Kangar","Kandukur","Kandra","Kandi","Kanchipuram","Kanadukattan","Kamthi","Kampil","Kamarhati","Kaman","Kamalganj","Kamakhyanagar","Kalyan","Vadodara","Kalugumalai","Kalpatta","Kalna","Kallupatti","Kallakkurichchi","Kalka","KaninaKhas","Kalimpong","Kalghatgi","Kalavad","Kalanwali","Kalanaur","Kalamb","Kalaikunda","Kaladhungi","Kakrala","Kakora","Kakching","KaithanKhera","Kairana","Kaimori","Kailashahar","Kaikalur","Kadur","Kadiri","Kadi","Kadambur","Kanchrapara","Kachhauna","Jutogh","Junagarh","JumriTilaiya","ShadipurJulana","Jubbal","Joshimath","Shimla","Assam","Jora","Jalandhar","Bhubaneswar","Jalarpet","Jogighopa","JodiyaBandar","Jodhpur","Jobat","Jintur","Jhusi","Jhinjhana","Jharsuguda","Jharia","Jhansi","Jhalu","Jhalida","Jhajjar","Jhabua","Jevargi","Jetpur","Jejuri","Jaynagar","Jaykaynagar","Jawhar","JawalaMukhi","Jawad","Jatwara","Jatani","Jasrana","Jaso","Jashpurnagar","Jarwal","Jansath","Jangaon","Jandiala","Jamui","Jamnagar","Jamshedpur","Jammu","JammuandKashmir","Kashmir","Jammalamadugu","Jambusar","Jamalpur","Jamadoba","Jalor","JalgaonJamod","Jalgaon","Jalesar","Jalalpur","Jalali","Jalalabad","Jalakandapuram","Jajpur","Jaithari","Jait","Jaisinghnagar","Jais","Jaipur","Rajasthan","Jainpur","Jahangirpur","Jahangirabad","Jahanabad","Jagraon","Jaggayyapeta","Gaya","Jagdalpur","Jagannathpur","Jagadhri","Itwa","Itaunja","Itanagar","Islampur","Isagarh","Irinjalakuda","Indri","Indore","Pimpri","Indi","Indapur","Iluppur","Ilampillai","Ikauna","Igatpuri","Idappadi","Ichchapuram","Hyderabad","Telangana","AndhraPradesh","Hadagalli","Hunsur","Hukeri","Hubli","Hosur","Hoskote","Hoshangabad","Hosangadi","Hosakote","Honavar","HoleNarsipur","Hojai","Hisua","Hiriyur","HirapurHamesha","Hirakud","Hingoli","Hindupur","Hindaun","HimachalPradesh","Hesla","Hempur","Hazaribagh","Hatta","Hatia","Hata","Hassan","Hasanpur","Haryana","Harsud","Harpanahalli","Harnai","Harij","Haridwar","Harduaganj","HardaKhas","Hapur","Hanumangarh","Hansi","Handia","Hamirpur","Halvad","Haliyal","Halena","Haldibari","Hajo","Hajipur","Hailakandi","Hadgaon","Gyanpur","Gwalior","Guskhara","Guntur","GuruHarSahai","Gursahaiganj","Gurmatkal","Gurgaon","Ulhasnagar","Gunupur","GuntakalJunction","Gunjrauliya","Guna","Gumla","Guledagudda","Gulbarga","Gulaothi","Gujarat","Guhagar","Guduvancheri","Gudur","Gudivada","Gudari","Gubbi","Goyerkata","Govindgarh","Govardhan","Goshainganj","Gorur","Gorakhpur","Gopinathpur","Gopamau","Gopalpur","Gooty","Gondal","Gomoh","Golakganj","Golaghat","Gokul","Gokak","Gohand","Gohadi","Gogapur","Godda","Gobindpur","GoaVelha","DamanandDiu","Giridih","Gingee","Giddalur","Ghusuri","Ghugus","Ghosi","Ghoghapur","Ghiror","Ghaziabad","Ghatanji","Ghatal","Gharaunda","Ghanaur","Dhatkidih","GeorgeTown","Gawan","Gauripur","Goribidnur","Guwahati","Garui","Gariaband","Garhmuktesar","Garhakota","Garautha","GanjMuradabad","Gangtok","Gangoh","Gangavalli","Gangapur","Gangapur","Gangakher","GandhiNagar","Gandhidham","Gandarbal","Galiakot","Gajendragarh","Gadwal","Gadhada","Gadag","Erode","Forbesganj","Ferozepore","Ferokh","Fazilka","FatehpurSikri","Fatehpur","Fatehpur","Fatehgarh","Fatehabad","Farrukhnagar","Farrukhabad","Faridnagar","Faridabad","Farah","Faizpur","Ettaiyapuram","Etah","Etahwah","Erraguntla","Ernakulam","Eraniel","Eral","Ellore","Elumalai","Elayirampannai","Egra","Dwarahat","Durgapur","Durg","Ludhiyana","Dungarpur","Dumraon","Dumka","DamDam","Duggirala","Dudhi","Dubrajpur","Dostpur","Dores","Dongargarh","Dondaicha","Domariaganj","Dohrighat","DodBallapur","Diu","Disa","Diphu","Dindori","Dinanagar","Diju","Diglur","Digha","Digapahandi","Didwana","Dibrugarh","DiamondHarbour","Dhuri","Dhulian","Dhuburi","Dhrangadhra","Dhone","Dhola","Dhilwan","Dhemaji","Dhaurahra","Dharwad","Dharuhera","Dharmavaram","Dharmanagar","Dharmabad","Dhari","Dharapuram","Dharampuri","Dhar","Dhanera","Dhandhuka","Dhanbad","Dhanaula","Dhamtari","Dhamnod","Dhaka","Dewa","Devgarh","Devarkonda","Devanhalli","Devadanappatti","Desuri","Deshnoke","DeraGopipur","Depalpur","Deoria","Deoranian","Deolali","Deogarh","Denkanikota","DelhiCantonment","Delhi","Dehri","Dehradun","Debipur","Davorlim","Dausa","Daund","Daulatpur","Daudnagar","Datia","Dasuya","Daryapur","Darwha","Darjiling","Darbhanga","Dangrawari","Dinapore","Damnagar","Daltonganj","Dalmau","Dalhousie","Daitari","DahmiKalan","Dahanu","Dadri","Dabwali","Daboh","Dabhoi","Cuttack","Uttarakhand","Curchorem","Vijaywada","Cumbum","Cuddalore","Coondapoor","Colva","Colonelganj","Colgong","Coimbatore","ClementTown","Churachandpur","Chunar","ChuariKhas","Chorhat","Chopan","Chodavaram","Chittur","Chittaurgarh","Chittarkonda","Chitapur","Chirgaon","Chirala","Chiplun","ChinnaSalem","Chinchvad","Chincholi","Chinchani","Chilia","Chikodi","Chikmagalur","Chikhli","ChikBallapur","Chidambaram","Chicholi","Chicalim","ChhotiSadri","Chhindwara","Chhatarpur","Chhata","Chhaprauli","Chhapar","Chhachhrauli","Cheyyur","Chetput","Chennimalai","Chengam","Chelakara","Chetwayi","Chaukhandi","Chatrapur","Chatakonda","Charthawal","Charkhari","Chapra","Channarayapatna","Channagiri","Chandwaji","ChandurBazar","Chandur","Chandrakona","Chandla","Chandigarh","Chandia","Chandbali","Chandauli","Chanasma","Champua","Champahati","Chamba","Challakere","Chalala","Chakrata","Chaklasi","Chakia","Chail","Chabua","Carapur","Kannur","Kolkata","Buxar","Buriya","Burhanpur","Bundi","Bulandshahr","Budhlada","Budaun","Brahmapur","Borsad","Bongaigaon","Mumbai","Bolanikhodan","Bokakhat","Boisar","Bodinayakkanur","Bodhan","Bithur","Bissau","Bishnupur","BisendaBuzurg","Bisalpur","Birpur","Birdpur","Binka","Etawa","Bilsi","Biloli","Bilhaur","Bilgi","Bilaspur","Bilaspur","Bilasipara","Bilari","Bikramganj","Bikaner","Bijnor","Bijnaur","Bijawar","Bihpuriagaon","BiharSharif","Bihar","BighapurKhurd","Bidar","KilBhuvanagiri","Bhundsi","Bhuj","Bhiwandi","Bhubaneshwar","Bhowali","Bhopal","MadhyaPradesh","Bhongaon","Bhojudih","Bhiwani","Bhitarwar","Bhinmal","Bhindar","Bhind","Bhimunipatnam","Bhimavaram","Bhilai","Bhikangaon","Bhayavadar","Bhawanigarh","Bhavnagar","Bhattiprolu","Bhatkal","Bhatgaon","Bhasawar","Bharuch","Bharkol","Bhanvad","Bhanpura","Bhander","Bhandarej","Bhamora","Bhaisa","Bhagwantnagar","Bhadreswar","Bhadrakh","Bhadra","Bhadaur","Bhadarwah","Bhabhua","Bhabhra","Bewar","Betul","Betma","Beswan","Berasia","Belgaum","Beniganj","Bemetara","Belur","Belsand","Belluru","Beliator","Belgharia","Beldanga","Belanganj","Bela","Behror","Begusarai","Begowal","Bedi","Beawar","Bayana","Bawal","Batoti","Baswa","Basudebpur","Basoda","Basna","Basi","Basi","Basavakalyan","Barwara","Barwala","Baruni","Barsi","Barpeta","Barpali","Barmer","BarkiSaria","BarkaKana","Barjala","Baripada","Bari","patamda","Barh","Barghat","Bargarh","Bareilly","Barddhaman","Baraut","Barasat","Baran","Baramati","Baragaon","BaraBazar","Bapatla","Bantval","Banswara","Banskhoh","Bansgaon","Bansbaria","Bannur","Bankura","Banka","Banihal","Bangarapet","Banganapalle","Banga","Bandipura","Banda","Banavar","Banapur","Bamora","BambooFlat","Balurghat","Balrampur","BalodaBazar","Balod","Ballalpur","Balimila","Bali","Balasore","Baldev","Balapur","Balaghat","Bakshwaho","Bakloh","Bakewar","Bakani","BajBaj","Byndoor","Baikunthpur","Baihar","Bahua","Bahraigh","Bahjoi","Baharampur","Bahadurganj","Bagula","Bagli","Bagdogra","BaghaPurana","Bageshwar","Bagasra","Bagalur","Bagaha","Baduria","Badlapur","Badarwas","Badarpur","Badami","BadaBarabil","Bachhraon","Babrala","Babina","Babai","Ayyampettai","Ayakudi","Avanigadda","Avadi","Auras","Aurangabad","Auraiya","Attur","Attayyampatti","Atrauli","Adirampattinam","athagarh","Atarra","Asirgarh","Asika","Ashti","Ashta","Asegaon","asansol","arvi","ArunachalPradesh","Arumbavur","Arsikere","Noria","Arkalgud","Arimalam","Aruvankad","Arantangi","Arangaon","Arambol","Arakkonam","Aonla","Anuppur","Antu","Anta","Annur","Annavasal","Ankola","Anjar","Anjad","Angamali","Andol","Andippatti","NaviMumbai","AndamanandNicobarIslands","Anantapur","Anandnagar","Anakapalle","Amudalavalasa","Amroli","Amritsar","Amravati","Noida","Okhala","Ammapettai","Amloh","amlagora","Amguri","Amethi","Amber","Ambikapur","Ambasamudram","Ambala","Ambahta","AmbagarhChauki","Amarwara","Amarpur","Amarnath","Amanpur","Amalner","Alwaye","Alwar","Alot","Alnavar","Alappuzha","Allahganj","Allahabad","Prayagraj","Alipur","Aligarh","Aliganj","Aldona","Alappakkam","alangudi","Alanganallur","Alandi","Alampur","Alagapuram","Akola","Aklera","Akhnur","Akbarpur","Akalkot","Ajra","Ajmer","Ajapura","Aizawl","Ahraura","Ahmadpur","Ahmadgarh","Ahiri","Agra","Agartala","Agar","Afzalgarh","Aduthurai","Adra","Adilabad","Adalaj","Achalpur","Abu","Brugglen","Kabul","Colombo","Wuhan","Kathmandu","Yangon","Macau","Karachi","Manila","Jakarta","HongKong","KualaLumpur","Bahamas","Taipei","Kyoto","SiemReap","Dhaka","Islamabad","Sydney","Berlin","Beijing","London","Paris","NewYork","Tokyo","Barcelona","Zurich","WashingtonDC","Toronto","SanJose","Boston","Rome","LosAngeles","Amsterdam","Madrid","SanFrancisco","Dubai","Singapore","Chicago","Moscow","Bristol","Tampa","KansasCity","Sacramento","Detroit","SaintLouis","Shanghai","Columbus","Birmingham","SanAntonio","RiodeJaneiro","Edmonton","Copenhagen","Atlanta","Brisbane","Philadelphia","Montreal","Austin","Orlando","Oslo","Doha","Denver","Brussels","Calgary","AbuDhabi","Vienna","Melbourne","Vancouver","Istanbul","Dallas","Seattle","Dublin","Milan","Houston","Munich","Prague","Seoul","SanDiego","Miami","Frankfurt","LasVegas"];





/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>
