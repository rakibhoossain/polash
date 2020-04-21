<?php
function front_narshindi_function($atts = array()) {
  ob_start();
    // set up default parameters
  extract(shortcode_atts(array(
   'title' => 'করোনা আপডেট',
   'sub_title' => 'বর্তমান করোনা পরিস্থিতি'
  ), $atts));
?>
<div class="col-md-12">

        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-lg-2 offset-xl-2">
                 <div class="section-title text-center mr-40 ml-40 mb-30">
                     <span><i class="far fa-heart-circle"></i> <?php echo $title; ?></span>
                     <h1><?php echo $sub_title; ?></h1>
                 </div>
            </div>
        </div>

    <table class="table table-bordered table-hovered" id="corona_update_table">
        <thead>
            <tr>
                <th>অঞ্চল</th>
                <th>সনাক্ত</th>
                <th>রিকোভারি</th>
                <th>মৃত্যু</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $c_items = ['sadar' => 'সদর থানা', 'palash' => 'পলাশ থানা ', 'raypur' => 'রায়পুর থানা ', 'shibpur' => 'শিবপুর থানা ', 'monohordi' => 'মনোহরদী থানা ', 'belab' => 'বেলাব থানা ', 'narshindi' => 'নরসিংদী জেলা ', 'bangladesh' => 'বাংলাদেশ*', 'world' => 'বিশ্ব*'];
            foreach($c_items as $item => $bn_name){
                $key_active = 'wp_violet_'.$item.'_active';
                $key_recovered = 'wp_violet_'.$item.'_recovered';
                $key_fatal = 'wp_violet_'.$item.'_fatal';
            ?>
            <tr class="tbl_success">
                <td><?php echo $bn_name; ?></td>
                <td><?php echo get_option($key_active); ?></td>
                <td><?php echo get_option($key_recovered); ?></td>
                <td><?php echo get_option($key_fatal); ?></td>
            </tr>  
            <?php
            }
            ?>          
        </tbody>
    </table>
</div>

<?php
return ob_get_clean();
}
add_shortcode('POLASH_NARSHINDI', 'front_narshindi_function');