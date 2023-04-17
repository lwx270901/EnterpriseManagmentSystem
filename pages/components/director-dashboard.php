<style>
    .table-header {
        max-width: 1100px;
        margin: auto;
        background-color: var(--section-gray);
        font-family: var(--main-font);
    }

    .field-name {
        text-align: center;
        /* border-style: solid; */

    }
</style>

<div class="table-header row px-0 g-0">

    <div class="field-name col-6 px-0" id="department-name">Department name
        <div class="field-name"> d1</div>
        <div class="field-name"> d2</div>

    </div>
    <div class="field-name col-6 px-0" id="department-head">Deparment head
        <div class="field-name"> A</div>
        <div class="field-name"> B</div>

    </div>
    <form>
        <label for="search-department">Choose department</label>
        <input list="departments" id="search-department" name="deparment" required>

        <label for="search-user">Choose user</label>

        <input list="users" id="search-user" name="deparment" required>

        <button id="add-dh" type="button"> Add</button>


    </form>
    <div id="dep-results" style="display: none;"></div>
    <div id="user-results" style="display: none;"></div>


</div>
<script type="module" src="pages/components/director-dashboard.js">

</script>