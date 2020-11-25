
<!-- Delete Meal Modal -->
<div class="modal fade" id="del<?php echo $meal['id'];?>" tabindex="-1" role="dialog" aria-labelledby="deleteMealLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="deleteMealLabel">Delete Meal</h4>
            </div>
            <div class="modal-body">
                <form method="post">
                    Are you sure you want to delete this Record?
                    <input type="hidden" name="id" value="<?php echo $meal['id']; ?>"/>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <a href="submit.php?deleteid=<?php echo $meal['id']; ?>"><button type="button" name="deletemeal" class="btn btn-primary">Delete</button></a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>