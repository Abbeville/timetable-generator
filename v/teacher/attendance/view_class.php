<?php
$viewing_current_class_id = $this->current_class_attendance;
//print_r($viewing_current_class_id);
$att_count = \count($viewing_current_class_id);
//echo "$att_count";
?>
<table class="table  table-striped table-condensed cf">
    <thead class="cf">
<!--<thead>-->
        <?php if ($att_count != 0) { ?>


            <tr>
                <th class="min-w-td"> #</th>

                <th>Name</th>

                <th class="min-w-td">Status</th>

            </tr>
        <?php } ?>

        <?php if ($att_count === 0) { ?>


            <tr>
                <th>NO ATTENDANCE RECORD FOR THIS CLASS ON SELECTED DATE</th>


            </tr>
        <?php } ?>
    </thead>
    <tbody>



        <?php $sn = 1;
        foreach ($viewing_current_class_id as $key => $value) { ?>


            <tr class="">

                <td class="min-w-td"><?php echo $sn; ?></td>


                <td><?php echo $value["student_name"] ?></td>

                <td class="min-w-td"><?php
                    if ($value["status"] === "0") {
                        echo 'Absent';
                    } elseif ($value["status"] === "1") {
                        echo 'Present';
                    }
                    ?></td>

            </tr>
            <?php $sn++;
        } ?>
    </tbody>
</table>