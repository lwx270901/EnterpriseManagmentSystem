<div class="container-task">
    <form action="" class="row g-0 assign-task">
        <div class="description">

            <label for="description">Description</label>
            <textarea wrap="off" placeholder="enter description..." name="description"> </textarea>
        </div>
        <div class="col-6 px-0 deadline">
            <label for="deadline"> Deadline</label>
            <input type="datetime-local" name="deadline" id="">
        </div>
        <div class="col-6 px-0 employee">
            <label for="employee">Employee</label>
            <input type="text" name="employee" id="">
        </div>
        <div class="button">
            <button type="button">Assign</button>
        </div>
    </form>
</div>
<style>
    @import 'assets/css/variable.css';
    label {
        font-size: 1.5rem;
        padding: 0 1.5rem;
    }
    label::after{
        content: ': ';
        
    }
    .assign-task {
        max-width: 1100px;
        /* height: 500px; */
        border-style: solid;
        margin: auto;
        text-align: center;
        top: 1.5rem;
        color: var(--main-text);
    }

    .description {
        width: 100%;
        border-style: solid;
        text-align: left;
    }

    .description>textarea {
        
        text-align: left;
        padding: 0;
        border-style: solid;
        width: 100%;
        line-height: 1rem;
        height: 10\rem;
    }
</style>