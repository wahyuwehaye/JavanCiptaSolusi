<?php

/*
* README
* ======
*
* Di bawah ini adalah contoh kode untuk aplikasi CMS khusus programmer yang ingin membuat tutorial atau screncasts.
* Di setiap kode telah dituliskan komentar untuk membantu Anda memahami kebutuhan fungsional yang harus diimplementasi.
* Misi Anda adalah melengkapi potongan kode yang disediakan sehingga aplikasi dapat berjalan sesuai kebutuhan
*
*/

$app = new TestApplication;
$app->run();

class TestApplication
{
    public function run()
    {

        // DI BAWAH INI ADALAH CONTOH PEMANGGILAN CLASS Post
        // CARA PEMANGGILAN BISA DIMODIFIKASI SESUAI KEBUTUHAN

        // User bisa membuat konten baru dengan fitur WYSIWYG yang tersedia.
        // Selain text, user juga bisa menampilkan video youtube dengan menuliskan shortcode [youtube id=<ID_VIDEO>]
        // $post = new Post("Tutorial membuat CRUD dengan Laravel: [youtube id=HmV4gXIkP6k]");
        $post = new Post("Tutorial membuat CRUD dengan Laravel: <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HmV4gXIkP6k\" frameborder=\"0\" allowfullscreen></iframe>");

        // Output:
        // "Tutorial membuat CRUD dengan Laravel: <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HmV4gXIkP6k\" frameborder=\"0\" allowfullscreen></iframe>" .
        echo $post->getHtmlContent();

        // Seiring berjalannya waktu, ditambahkan fitur baru dimana User juga bisa menampilkan potongan kode dari gist.github.com
        // $post = new Post("Tutorial membuat CRUD dengan Laravel: [youtube id=HmV4gXIkP6k]" .
        //                  "Contoh kode bisa dilihat di bawah ini: [gist id=9fdb82372bd10b5627e0]");
        $post = new Post("Tutorial membuat CRUD dengan Laravel: <iframe width='560' height='315' src='youtube.com/embed/HmV4gXIkP6k' frameborder='0' allowfullscreen></iframe>, Contoh kode bisa dilihat di bawah ini: <script src='gist.github.com/you-think-you-are-special/9fdb82372bd10b5627e0.js'></script>")

        // Output:
        // "Tutorial membuat CRUD dengan Laravel: <iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/HmV4gXIkP6k\" frameborder=\"0\" allowfullscreen></iframe>" .
        // "Contoh kode bisa dilihat di bawah ini: <script src="https://gist.github.com/you-think-you-are-special/9fdb82372bd10b5627e0.js"></script>" .
        echo $post->getHtmlContent();

        // Jaman terus berubah, di masa yang akan datang, semakin banyak "shortcode" yang bisa ditambahkan untuk membuat konten semakin menarik.
        // Rencana paling dekat adalah menambahkan shortcode [quote] yang akan menampilkan random quote dari https://api.chucknorris.io/

        // Tugas Anda adalah mendesain sebuah class Post yang "bisa bertahan terhadap perubahan jaman",
        // dalam artian class tersebut bisa mengakomodasi penambahan shortcode sebanyak apapun,
        // namun class tetap mudah dimaintain dan clean.
        // HINT: Bagaimana caranya agar setiap ada penambahan shortcode baru bisa dilakukan tanpa harus memodifikasi class Post

        // Jika Anda masih berpikir menggunakan kode semacam ini:
        //         if ($shortcode == 'youtube') {
        //             // proses Youtube shortcode
        //         } elseif ($shortcode == 'gist') {
        //             // proses Gist shortcode
        //         }
        //         ...
        // Sebaiknya Anda apply posisi Junior Programmer saja
    }
}

class Post
{
    protected $content;

    /**
     * Post constructor.
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getHtmlContent()
    {
        // YOUR CODE HERE
        $getContent = $content;
        $resultContent = (explode(",",$getContent));
        for($i=0; $i<count($resultContent); $i++){
            $getShortCode = $resultContent[$i];
            $resultShotCode = (explode(":", $getShortCode));
            for($j=0; $j<count($resultShotCode); $j++){
                echo $resultShotCode[$j];
                echo $resultShotCode($j+1);
            }
        }
    }

    // OTHERS FUNCTION HERE, IF NECESSARY
}


// OR HERE, IF YOU REALLY NEED TO WRITE ANOTHER FUNCTION OR CLASS OR INTERFACE OR TRAIT
