
<style>
    .workrange-days {
        display: flex;
        max-width: 100%;
        flex-flow: row wrap;
    }
    .mainpage-day {
        padding: 3px 10px;
        text-align: center;
        border: 1px solid #eee;
        font-size: 15px;
    }
    .mainpage-day-yes {
        background: #2ecc71;
        color: #fff;
    }
    .mainpage-day-no {
        color: #999;
        background: #666;
    }
</style>
<p class="mb-1"><b>Etat:</b>
<?php 
    if(count(auth()->user()->worktimes()->where('working', 1)->get()) > 0){
        echo count(auth()->user()->worktimes()->get()), '/7';
    } else {
        echo '0/7';
    }
?>
</p>
<div class="workrange-days">
<?php
    if(count(auth()->user()->worktimes()->get()) > 0){
        foreach(auth()->user()->worktimes()->get() as $item){
            if($item->working){
                echo '<div class="mainpage-day mainpage-day-yes">'; echo substr($item->type, 0, 2); if($item->type == 'ŚRODA'): echo 'R'; endif; echo '</div>';
            } else {
                echo '<div class="mainpage-day mainpage-day-no">'; echo substr($item->type, 0, 2); if($item->type == 'ŚRODA'): echo 'R'; endif; echo '</div>';
            }        
        }
    } else {
        echo '<div class="mainpage-day mainpage-day-no">Niezdefiniowano etatu</div>';
    }
    
?>

</div>   

    
    