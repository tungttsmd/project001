<style>
    #flex-form {
        display: flex;
        flex-direction: column;
        gap: 20px;
        padding: 20px;
        max-width: 768px;
        justify-content: center;
        border: 1px solid black;
    }

    #flex-form input,
    #flex-form textarea,
    #flex-form button {
        padding: 10px 20px;
    }

    /* Table styles */
    table {
        width: 100%;
        margin-top: 20px;
        min-height: 100px;
        outline: 1px solid black;
        table-layout: fixed;
        /* Bắt buộc để ellipsis hoạt động theo % width */
    }

    table td {
        outline: 1px solid black;
        padding: 12px 2px;
        white-space: nowrap;
    }

    table td,
    table th {
        white-space: nowrap !important;
        overflow: hidden !important;
        text-overflow: ellipsis !important;
        padding: 6px 12px !important;
    }

    th.w0 {
        width: 100% !important;
    }

    th.w1 {
        width: 100% !important;
    }

    th.w2 {
        width: 200% !important;
    }

    th.w3 {
        width: 300% !important;
    }

    th.w4 {
        width: 400% !important;
    }

    th.w5 {
        width: 500% !important;
    }

    table a {
        color: gray;
        text-decoration: none !important;
    }

    /* Profile card styles */
    .profile-card {
        max-width: 600px;
        margin: 30px auto;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .profile-card img {
        object-fit: cover;
        width: 100%;
        height: 250px;
    }

    .profile-body {
        padding: 20px;
    }

    .profile-body h5 {
        margin-bottom: 10px;
    }

    /* Read-only form fields */
    .form-control.readonly {
        background-color: lightgray !important;
    }

    select.form-select:focus {
        border-color: #343a40;
        box-shadow: 0 0 0 0.2rem rgba(52, 58, 64, .25);
    }

    .frame-table {
        max-height: calc(44px * 8 + 38px);
    }
</style>