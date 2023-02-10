<?php
class Post
{
    private string $title;
    private string $description;
    private string $image;
    private array $programs;
    private string $url;
    private bool $invert;
    public function __construct(string $title, string $description, string $image = "", array $programs = [], string $url = "#", bool $invert)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->programs = $programs;
        $this->url = $url;
        $this->invert = $invert;
    }

    public function get_title()
    {
        return $this->title;
    }

    public function get_description()
    {
        return $this->description;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function get_programs()
    {
        return $this->programs;
    }

    public function get_url()
    {
        return $this->url;
    }

    public function get_invert()
    {
        return $this->invert;
    }
}

$vscode = "./assets/ico/vscode.webp";
$photoshop = "./assets/ico/photoshop.webp";
$inkscape = "./assets/ico/inkscape.webp";
$inkscapewhite = "./assets/ico/inkscape-w.webp";
$behance = "./assets/ico/behance.webp";
$blender = "./assets/ico/blender.v";
$c4d = "./assets/ico/c4d.webp";
$premierpro = "./assets/premierpro.webp";

$posts = array(
    new Post(
        // title
        "Website Redesign",
        // description
        "Responsive website redesign mockup made for Teenage Engineering with vanilla <span class=\"highlighted\">HTML/CSS/JS</span> over 2 days.",
        // thumbnail
        "./assets/thumbs/teenage.webp",
        // programs
        array($vscode, $photoshop, $inkscape),
        // project url
        "https://ukyo.studio/ps/te/index.html",
        // invert
        false
    ),
    new Post(
        // title
        "Website Concept",
        // description
        "Responsive brutalist website design made in one day, using vanilla <span class=\"highlighted-invert\">HTML/CSS/JS.</span>",
        // thumbnail
        "./assets/thumbs/aria.webp",
        // programs
        array($vscode, $photoshop, $inkscape),
        // project url
        "https://ukyo.studio/ps/aria/index.html",
        // invert
        true
    )
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content=
    "April Hombsch Design Portfolio.
    Graphic design, Motion art, UI/UX, Web design, 3D art, 3D modeling.
    ">
    <meta name="keywords" content="Art, Design, Music, Portfolio, ukyo, CSS, UI/UX">
    <meta name="author" content="April Hombsch">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="main.css" rel="stylesheet" type="text/css">
    <link rel="preload" href="main.css" as="style" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Vollkorn">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela%20Round">
    <script src="https://kit.fontawesome.com/62b34dd1ed.js" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    <link rel="apple-touch-icon" sizes="128x128" href="iosicon.png">
    <title>UKYO - April Hombsch</title>
</head>
<body>
    <div class="cursor"></div>
    <div class="custom">
        <svg xmlns="http://www.w3.org/2000/svg">
            <path id="circlePath" transform="translate(25 25)"
                d="M50,100L50,100C22.4,100,0,77.6,0,50v0C0,22.4,22.4,0,50,0h0c27.6,0,50,22.4,50,50v0C100,77.6,77.6,100,50,100z"
                fill="none" />
        </svg>
    </div>
    <div class="main">
        <div class="wip-card visible-anim">
            <div class="wip-tooltip">
                <div id="tooltip-triangle">
                </div>
                <p class="wip-tooltip-text">
                    This site is still under construction!<br>
                    Please check back later :)
                </p>

            </div>
            <p class="wip-text"> <i class="fa-solid fa-person-digging"></i> </p>
        </div>
        <div class="hero">
            <div class="title visible-anim">
                <img src="./assets/title.webp" class="title-img" alt="UKYO">
            </div>
            <div class="hero-divider"></div>
            <img src="./assets/scrolldown.webp" class="down-icon visible-anim" alt="v">
        </div>
        <div class="divider"></div>
        <div class="scroll-container">
            <a href="#top"><i class="fa-solid fa-circle-chevron-up top-of-page"></i></a>
        </div>

        <?
        foreach ($posts as &$post) {
            $invert = $post->get_invert() ? "content-wrap-invert" : "content-wrap";
            echo '<div class="' . $invert . ' visible-anim">';
            $invert = $post->get_invert() ? "content-left-invert" : "content-left";
            echo '<div class="' . $invert . '">';
            $invert = $post->get_invert() ? "content-link-invert" : "content-link";
            $invertico = $post->get_invert() ? "link-ico-invert" : "link-ico";
            echo '<a href="' . $post->get_url() . '" target="_blank" class="' . $invert . '"><h1>' . $post->get_title() . '</h1></a><i class="fa-solid fa-square-arrow-up-right ' . $invertico . '"></i>';
            $invert = $post->get_invert() ? "content-hr-invert" : "content-hr";
            echo '<hr class="' . $invert . '">';
            $invert = $post->get_invert() ? "content-text-invert" : "content-text";
            echo '<p class="' . $invert . '">' . $post->get_description() . '</p>';
            $programs = $post->get_programs();
            if (count($programs) > 0) {
                echo '<span class="programs">';

                foreach ($programs as &$program) {
                    echo '<img src="' . $program . '" class="programs-ico" alt="Software Icon">';
                }
                ;
                echo '</span>';
            }
            ;
            echo '</div>';
            $invert = $post->get_invert() ? "content-right-invert" : "content-right";
            echo '<div class="' . $invert . '">';
            $invert = $post->get_invert() ? "content-img-invert" : "content-img";
            echo '<img src="' . $post->get_image() . '" class="' . $invert . '" alt="Project Preview Image">';
            echo '</div>';
            echo '</div>';
        }
        ?>

        <div class="view-all visible-anim">
            <p class="view-all-text" onclick="changeText(this)">
                View All
            </p>
        </div>
        <div class="copied-box-hide" id="copy-box">
            <p class="copied-text"> Copied!
                <span style="position:relative; font-size:small; color:rgba(255, 255, 255, 0.746); bottom:1px;">
                    &nbsp; April#1234 </span>
            </p>
            <div id="triangle"></div>
        </div>
        <div class="socials">
            <a href="https://www.behance.net/aprilukyo" target="_blank"><img src="./assets/ico/behance.webp" class="socials-ico" alt="Behance"></a>
            <a href="https://github.com/AprilTheFool" target="_blank"><img src="./assets/ico/github.webp" class="socials-ico" alt="Github"></a>
            <a href="#a" class="discord-copy" onclick="showCopyNoitce(this)"><img src="./assets/ico/discord.webp" class="socials-ico" alt="Discord"></a>
        </div>
        <div class="footer">
            <p class="footer-text"> 2023 April Hombsch </p>
        </div>
    </div>
    <script src="./js/main.js"></script>
</body>
</html>