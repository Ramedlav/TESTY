
<div class="nav-scroller bg-white shadow-sm">
    <nav class="nav nav-underline">
        <br>
    </nav>
</div>

<main role="main" class="container">
    <div class="d-flex align-items-center p-3 my-3  bg-purple rounded shadow-sm">

        <div class="lh-100">
            <H1><?php if(isset($title)){echo $title;}?></H1>
        </div>

    </div>
    <div class="my-3 p-3 bg-white rounded shadow-sm">
        <h6 class="border-bottom border-gray pb-2 mb-0">List of all members </h6>

        <?php foreach($vars as $key => $value):?>

            <div class="media text-muted pt-3">
                <?
                if (($value['img']!=="/public/images/img.jpg")&&($value['img']!=="")) {
                    echo '<img class="mr-3" src='.$value['img'].' width="32" height="32">';
                }else{echo '<img class="mr-3" src="/public/images/img.jpg" width="32" height="32">';}
                ?>
                <p class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                    <strong class="d-block text-gray-dark">
                        <?php echo $value['firstname'].' '.$value['lastname'];  ?>
                    </strong>
                    <strong class="d-block text-gray-dark">
                        <?php echo 'report subject: '.$value['report_subject']; ?>
                    </strong>
                    <strong class="d-block text-gray-dark">
                        <?php echo 'email: <a href="mailto:'.$value['email'].'">'.$value['email'].'</a>'; ?>
                    </strong>
                </p>
            </div>
        <?php
        endforeach;
        ?>

        <small class="d-block text-right mt-3">
            <a href="#">All updates</a>
        </small>
    </div>

</main>

