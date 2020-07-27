<?session_destroy();?>

<script src="/public/scripts/Form.js"></script>
<script src="/public/scripts/Form_2.js"></script>
<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3  bg-purple rounded shadow-sm">
        <div class="lh-100">
            <h1><?php if(isset($title)){echo $title;}?></h1>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3303.7615498732034!2d-118.34587228441663!3d34.10124852259263!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80c2bf20e4c82873%3A0x14015754d926dadb!2zNzA2MCBIb2xseXdvb2QgQmx2ZCwgTG9zIEFuZ2VsZXMsIENBIDkwMDI4LCDQodCo0JA!5e0!3m2!1sru!2spl!4v1595465580615!5m2!1sru!2spl" width="100%" height="450px" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>

    <div class="my-3 p-3 bg-white rounded shadow-sm">

        <h6 class="border-bottom border-gray pb-2 mb-0">Please, send your data</h6>
            <?if(!isset($_SESSION['email'])){
                echo "<div id=\"part1\" style=\"outline: 2px solid #000;\">";
            }
            else
                {
                echo "<div id=\"part1\" style=\"outline: 2px solid #000; display: none;\" >";
                }?>
            <form name="name_form_1" id="id_form_1" class="form-signin" >

                <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Firstname*" required autofocus>
                <input name="lastname" id="lastname" type="text" class="form-control" placeholder="Lastname*" required>
                <input name="birthdate" id="birthdate" type="date" class="form-control" required>
                <input name="report_subject" id="report_subject" type="text" class="form-control" placeholder="Report subject*" required>
                <select name="country" id="country" class="form-control" required>
                    <option value="0">select your coutry</option>
                    <? foreach($country as $countr){
                        echo '<option value="'.$countr["id"].'">'.$countr["name"].'</option>';
                    }?>

                </select>
                <input onkeyup="this.value = this.value.replace(/[^\d]/g,'');" name="phone" id="phone" type="number" class="form-control" placeholder="(555)555-5555*" required>
                <input id="email_1" type="email" name="email" class="form-control" placeholder="email*" required >
                <button id="next" type="button">NEXT-></button>
            </form>
        </div>

        <?if(!isset($_SESSION['email'])){
            echo "<div id=\"part2\" style=\"outline: 2px solid #000; display: none;\">";
             }
             else
                {
                echo "<div id=\"part2\" style=\"outline: 2px solid #000;\">";
                }?>
            <form name="name_form_2" id="id_form_2" class="form-signin" method="POST" action="/main/register_next" enctype="multipart/form-data">
                <?if(!isset($_SESSION['email'])){
                    echo "<input id=\"email_2\" type=\"hidden\" name=\"email_2\">";
                }
                else
                    {
                        echo "<input id=\"email_2\" type=\"hidden\" name=\"email_2\" value=\"".$_SESSION['email']."\">";
                    }
                    ?>

                <input name="company" id="company" class="form-control" placeholder="company">
                <input name="position" id="position" class="form-control" placeholder="position">
                <textarea name="about_me" id="about_me" class="form-control" placeholder="about me"></textarea>
                <p>load the photo</p>
                <input type="file" name="img" id="myfile">
                <button type="button" id="next_2">NEXT-></button>
            </form>
        </div>

        <div id="part3" style="outline: 2px solid #000; display: none;">
            <?php
            $url = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] .  "allmembers/show";
            ?>
            <a href="http://www.facebook.com/sharer.php?s=100&p[url]=<?php echo urlencode( $url ); ?>" onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false" title="Send to FaceBook" target="_parent"><img src="/public/images/fb.png" width="32" height="32"></a>

            <?php
            $hashtags = 'Coding_Conference';
            ?>
            <a href="http://twitter.com/share?text=<?php echo $message; ?>&via=twitterfeed&related=truemisha&hashtags=<?php echo $hashtags ?>&url=<?php echo $link; ?>" title="Send to twitter" onclick="window.open(this.href, this.title, 'toolbar=0, status=0, width=548, height=325'); return false" target="_parent"><img src="/public/images/tw.png" width="32" height="32"></a>
            <form action="/allmembers/show" method="post">
                <button class="btn btn-danger" type="submit">show all members<?echo '('.$count.')';?></button>
            </form>
        </div>
    </div>
</main>
<?

?>