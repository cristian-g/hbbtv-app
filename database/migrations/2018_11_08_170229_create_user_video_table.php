<?php

use App\User;
use App\Video;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video', function (Blueprint $table) {
            $table->increments('id');

            // Connected user
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Video
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos');

            $table->timestamps();
        });

        $names = [
            "Dewayne Schuessler",
            "Joann Keough",
            "Katharine Knowles",
            "Renee Wison",
            "Mallory Jerkins",
            "Jarrod Liner",
            "Apolonia Mariano",
            "April Hartness",
            "Linn Migues",
            "Desirae Foulds",
            "Sherwood Fugate",
            "Irena Morgado",
            "Macie Lazar",
            "Eden Crigger",
            "Lawana Scroggins",
            "Jerald Valderrama",
            "Yetta Sedlock",
            "Lovella Ponds",
            "Ardis Guadalupe",
            "Lieselotte Slattery",
            "Leandra Corner",
            "Pat Muniz",
            "Domingo Zambrano",
            "Jong Schueller",
            "Vasiliki Nicastro",
            "Cecille Beech",
            "Trisha Mcnair",
            "Candice Rocamora",
            "Jonnie Townson",
            "Wayne Holcomb",
            "Sylvia Wegner",
            "Thu Panzer",
            "Myrtis Majeed",
            "Ola Murrin",
            "Mechelle Parshall",
            "Marlys Hazell",
            "Janna Nickell",
            "Isis Vine",
            "Madlyn Trostle",
            "Meggan Orton",
            "Jenna Brister",
            "Tonisha Avila",
            "Quincy Ryerson",
            "Shantel Azcona",
            "Cristina Carolan",
            "Melonie Farwell",
            "Jerold Robles",
            "Maurine Boothe",
            "Lesli Bonk",
            "Lara Kamerer",
            "Mike Hazelrigg",
            "Antonetta Dusseault",
            "Junita Duenas",
            "Elinore Place",
            "Kourtney Mcclean",
            "Penney Ashworth",
            "Javier Armond",
            "Pearlene Ganz",
            "Verline Dunston",
            "Sherice Hinojosa",
            "Enola Kress",
            "Johnna Enders",
            "Rosann Klenk",
            "Roberto Mcgrew",
            "Jacqulyn Bivins",
            "Julio Whitener",
            "Raisa Langham",
            "Justin Aziz",
            "Manual Dupuis",
            "Lamont Orndorff",
            "Yevette Mulloy",
            "Rafaela Lassen",
            "Barbara Orlandi",
            "Mei Marlow",
            "Ione Surrett",
            "Wilbur Elsberry",
            "Jacquelyne Costantino",
            "Izetta Royer",
            "Roselle Kuss",
            "Gertrudis Suarez",
            "Dominque Valenza",
            "Edwardo Arsenault",
            "Tierra Clay",
            "Ardella Blackstone",
            "Angela Rosebrock",
            "Jessia Atwood",
            "Sharika Beaudreau",
            "Mervin Guiterrez",
            "Sonia Phegley",
            "Shona Ussery",
            "Isa Noland",
            "Marline Tyner",
            "Tenisha Neumeister",
            "Timika Lingenfelter",
            "Daniel Tweed",
            "Sheridan Olszewski",
            "Alvin Rock",
            "Josef Gottlieb",
            "Olimpia Reda",
            "Rufus Wolken",
        ];

        $users = array();
        $length = count($names);
        for ($i = 0; $i < $length; $i++) {
            $user = new User([
                'name' => $names[$i],
            ]);
            $user->save();
            array_push($users, $user);
        }



        $movies = [
            [
                "title" => "The Founder",
                "director" => "John Lee Hancock",
                "description" => "The awesome story of McDonalds founder Ray Kroc: how he discovered the first restaurant, they partnership, problems and evolution.",
                "cast" => "Michael Keaton, Nick Offerman",
                "minutes" => 115,
                "source" => "https://www.dropbox.com/s/1wiycv091la0cnh/The%20Founder%20Official%20Trailer%20.mp4?dl=1",
                "thumbnail" => "",
            ],
            [
                "title" => "Snowden",
                "director" => "Oliver Stone",
                "description" => "The story of the famous programmer Edward Snowden, former NSA employee who leaked the famous spy program on a large scale.",
                "cast" => "Joseph Gordon-Levitt, Shailene Woodley",
                "minutes" => 134,
                "source" => "https://www.dropbox.com/s/u9nlljdkfhpzjj0/Snowden.mp4?dl=1",
                "thumbnail" => "",
            ],
            [
                "title" => "Jobs",
                "director" => "Joshua Michael Stern",
                "description" => "A movie about Steve Jobs starring Ashton Kutcher focusing on how Apple started and grew.",
                "cast" => "Ashton Kutcher, Josh Gad",
                "minutes" => 129,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "War Dogs",
                "director" => "Todd Phillips",
                "description" => "The real story of 2 friends who started a defense company, their first contracts and the problems on the way.",
                "cast" => "Jonah Hill, Miles Teller",
                "minutes" => 114,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Imitation Game",
                "director" => "Morten Tyldum",
                "description" => "The movie about how Alan Turing and his team deciphered German communications in World War II to win. ",
                "cast" => "Benedict Cumberbatch, Keira Knightley",
                "minutes" => 114,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Ex Machina",
                "director" => "Alex Garland",
                "description" => "A wealthy programmer develops prototypes with advanced AI and human appearance.",
                "cast" => "Domhnall Gleeson, Alicia Vikander",
                "minutes" => 108,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Social Network",
                "director" => "David Fincher",
                "description" => "The film about the creation and early evolution of Facebook.",
                "cast" => "Jesse Eisenberg, Andrew Garfield",
                "minutes" => 120,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Thirteenth Floor",
                "director" => "Josef Rusnak",
                "description" => "A philosophical film that tells the creation of a digital universe by a company.",
                "cast" => "Craig Bierko, Gretchen Mol",
                "minutes" => 100,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Equity",
                "director" => "Meera Menon",
                "description" => "A film focused on investing in startups and their strategies to raise or lower their price.",
                "cast" => "Anna Gun",
                "minutes" => 100,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Intern",
                "director" => "Nancy Meyers",
                "description" => "To the CEO of a very successful and very busy fashion startup, is assigned a senior fellow to delegate to him.",
                "cast" => "Robert De Niro, Anne Hathaway",
                "minutes" => 121,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Fifth Estate",
                "director" => "Bill Condon",
                "description" => "The film about the origin and evolution of WikiLeaks.",
                "cast" => "Benedict Cumberbatch, Daniel Brühl",
                "minutes" => 128,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Internship",
                "director" => "Shawn Levy",
                "description" => "Comedy by some gentlemen who enter Google as fellows.",
                "cast" => "Vince Vaughn, Owen Wilson",
                "minutes" => 119,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Wolf of Wall Street",
                "director" => "Martin Scorsese",
                "description" => "The true story of Jordan Belfort from his rise to a wealthy stock-broker without rules and infinite ambition living the high life to his fall involving crime.",
                "cast" => "Leonardo DiCaprio, Jonah Hill",
                "minutes" => 180,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Pursuit of Happyness",
                "director" => "Gabriele Muccino",
                "description" => "A real story of a sales man with little money, a family and his dream of becoming a broker.",
                "cast" => "Will Smith, Jaden Smith",
                "minutes" => 117,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Walk",
                "director" => "Robert Zemeckis",
                "description" => "A film based on the memories of a French wrangler and the continual challenges that he proposed and achieved.",
                "cast" => "Joseph Gordon-Levitt, Charlotte Le Bon",
                "minutes" => 123,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Nightcrawler",
                "director" => "Dan Gilroy",
                "description" => "An unemployed young man discovers an opportunity after seeing an accident. ",
                "cast" => "Jake Gyllenhaal, Rene Russo",
                "minutes" => 117,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Clear History",
                "director" => "Greg Mottola",
                "description" => "About a story of a partner who sells his shares and leaves his company that makes electric cars, which subsequently has a huge success and how he deals with that situation.",
                "cast" => "Larry David, Bill Hader",
                "minutes" => 100,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "The Capital",
                "director" => "Costa-Gavras",
                "description" => "A seemingly mediocre bank employee is promoted to CEO after the death of the former.",
                "cast" => "Gabriel Byrne, Gad Elmaleh",
                "minutes" => 114,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Waffle Street",
                "director" => "Ian Nelms, Esholm Nelms",
                "description" => "An investing fund manager remains unemployed after the financial crisis of 2008 and ends up working in a waffle restaurant.",
                "cast" => "Danny Glover, James Lafferty",
                "minutes" => 86,
                "source" => "",
                "thumbnail" => "",
            ],
            [
                "title" => "Pirates of Silicon Valley",
                "director" => "Martyn Burke",
                "description" => "The film about the beginnings of Microsoft and Apple and its competition.",
                "cast" => "Noah Wyle, Anthony Michael Hall",
                "minutes" => 95,
                "source" => "",
                "thumbnail" => "",
            ],
        ];

        $length = count($movies);
        for ($i = 0; $i < $length; $i++) {
            $video = new Video([
                "title" => $movies[$i]["title"],
                "director" => $movies[$i]["director"],
                "views" => random_int(10000, 50000),
                "description" => $movies[$i]["description"],
                "cast" => $movies[$i]["cast"],
                "minutes" => $movies[$i]["minutes"]
            ]);
            $video->save();
            $video->users()->sync([
                $users[$i*4+0]->id,
                $users[$i*4+1]->id,
                $users[$i*4+2]->id,
                $users[$i*4+3]->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_video');
    }
}
