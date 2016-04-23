<h2><?php _e("Availability", "madhouse_availability"); ?></h2>
<div class="box availability">

    <?php
        if( Session::newInstance()->_getForm('pp_d_start') !== '' ) {
            $detail = Session::newInstance()->_getForm('pp_d_start');
        } else {
            $detail = mdh_availability_start();
        }
    ?>
    <div class="control-group">
        <label class="control-label"><?php _e("Start", "madhouse_availability"); ?></label>
        <div class="controls">
            <input class="mdh-availability" type="text" name="availabilityStart" value="<?php echo $detail; ?>">
        </div>
    </div>
    <?php if(mdh_availability_end_date_setting() >0) : ?>
        <?php
            if( Session::newInstance()->_getForm('pp_d_end') !== '' ) {
                $detail = Session::newInstance()->_getForm('pp_d_end');
            } else {
                if (mdh_availability_end_date_setting() == 1) {
                    $detail = mdh_availability_end();
                } else {
                    $detail = mdh_availability_duration();
                }
            }
        ?>
        <div class="control-group">
            <?php if(mdh_availability_end_date_setting() == 1): ?>
                <label class="control-label"><?php _e("End", "madhouse_availability"); ?></label>
                <div class="controls">

                    <input class="mdh-availability" type="text" name="availabilityEnd" value="<?php echo $detail; ?>">
                </div>
                <?php else: ?>
                <label class="control-label"><?php _e("During", "madhouse_availability"); ?></label>
                <div class="controls">
                    <select name="availabilityEnd">
                        <option value=""><?php _e("Select a duration", "madhouse_availability"); ?></option>
                        <?php for ($i=1; $i <= 6; $i++): ?>
                            <option <?php echo ($detail == $i*30) ? 'selected="selected"': ""; ?> value="<?php echo $i*30; ?>"><?php echo $i ?>&nbsp;
                                <?php _e("Month", "madhouse_availability"); ?>
                            </option>
                        <?php endfor; ?>
                    </select>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
</div>

<script>
    $(".mdh-availability").datepicker({
        showOn:'focus',        
        minDate: -90
    });

	$.datepicker.regional['fi'] = {
		nextText: "",
        prevText:"",
        monthNames: [ "Tammikuu","Helmikuu","Maaliskuu","Huhtikuu","Toukokuu","Kesäkuu",
		"Heinäkuu","Elokuu","Syyskuu","Lokakuu","Marraskuu","Joulukuu" ],
		monthNamesShort: [ "Tammi","Helmi","Maalis","Huhti","Touko","Kesä",
		"Heinä","Elo","Syys","Loka","Marras","Joulu" ],
		dayNamesShort: [ "Su","Ma","Ti","Ke","To","Pe","La" ],
		dayNames: [ "Sunnuntai","Maanantai","Tiistai","Keskiviikko","Torstai","Perjantai","Lauantai" ],
		dayNamesMin: [ "Su","Ma","Ti","Ke","To","Pe","La" ],
		weekHeader: "Vk",
		dateFormat: "d.m.yy",
		firstDay: 1,
		isRTL: false,
		showMonthAfterYear: false,
		yearSuffix: ""
	};

    $.datepicker.setDefaults($.datepicker.regional['fi']);
</script>