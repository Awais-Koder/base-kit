<style>
    [x-cloak] {
        display: none;
    }

    /* This will hide the default scrollbar for the entire page */
    body,
    html {
        overflow-y: hidden;
    }


    .brand-link {
        background-color: white !important;
        /* You can change 'white' to any color you prefer */
        opacity: 1 !important;
        /* Ensuring full opacity */
    }

    .btn-primary {
        background-color: #6610f2;
        border-color: #6610f2;
    }

    .main-sidebar {
        position: fixed;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        /* Adjust based on your sidebar width */
        overflow-y: auto;
        height: 100vh;
        z-index: 1000;
        /* To ensure it's above other content */
    }

    .content-wrapper {
        overflow-y: auto;
        /* Enable vertical scroll */
        height: 100vh;
        /* Take full height of the viewport */
        margin-left: 250px;
        /* Adjust based on your sidebar width */
        position: relative;
        z-index: 900;
        /* Ensure content stays below the sidebar */
    }



    .sidebar {
        overflow-y: auto;
        height: calc(100vh - 57px);
        /* Adjust based on your header height or other elements that may push the sidebar down */
    }

    .sidebar::-webkit-scrollbar {
        width: 5px;
        /* Adjust width */
    }

    .sidebar::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 3px;
    }

    .sidebar::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }



    .sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .sidebar:not(:hover)::-webkit-scrollbar-thumb {
        display: none;
    }


    .content-wrapper::-webkit-scrollbar {
        width: 5px;
    }

    .content-wrapper::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 3px;
    }

    .content-wrapper::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }



    .content-wrapper::-webkit-scrollbar {
        width: 5px;
    }

    .content-wrapper:not(:hover)::-webkit-scrollbar-thumb {
        display: none;
    }


    {{-- .reduced-content {
    margin-right: 250px; /* Adjust the value as per the sidebar width */
} --}} @media (min-width: 769px) {
        .reduced-content {
            margin-right: 250px;
            /* Adjust the value as per the sidebar width */
        }
    }


    /* Increasing specificity */
    .navbar>.navbar-nav>li>a {
        padding-left: 5px !important;
        padding-right: 5px !important;
    }

    .control-sidebar-content h6 {
        margin-bottom: 0;
    }



    {{-- right sidebar --}} .control-sidebar {
        overflow-y: auto;
        height: calc(100vh - 76px);
        /* Adjust based on your header height */
    }

    .control-sidebar::-webkit-scrollbar {
        width: 5px;
    }

    .control-sidebar::-webkit-scrollbar-thumb {
        background-color: #888;
        border-radius: 3px;
    }

    .control-sidebar::-webkit-scrollbar-track {
        background-color: #f1f1f1;
    }

    .control-sidebar:not(:hover)::-webkit-scrollbar-thumb {
        display: none;
    }


    .custom-card-header {
        padding-top: 10px;
        padding-bottom: 10px;
    }


    {{-- tags modification --}} .tag-badge {
        position: relative;
        padding-right: 25px;
        /* Make space for the delete icon */
    }

    .delete-icon {
        display: none;
        position: absolute;
        top: 0;
        right: 0;
        cursor: pointer;
    }

    .tag-badge:hover .delete-icon {
        display: inline-block;
        animation: fadeIn 0.5s ease-in-out 2s forwards;
        /* Show after 2 seconds */
    }

    @keyframes fadeIn {
        to {
            opacity: 1;
        }
    }


    {{-- Dropdown edit and delete categories --}} .icon-container i {
        margin-left: 8px;
        /* Space out icons */
        cursor: pointer;
        /* Change cursor to indicate clickable */
        position: relative;
    }

    .icon-container:hover i {
        visibility: visible;
        /* Show icons on hover */
    }

    /* Optionally, add transition delay for hover effect */
    .icon-container:hover i {
        transition-delay: 2s;
    }

    .editDltBtn {
        display: block;
        position: absolute;
        transform: translate(50%, -50%);
        bottom: 1px;
        right: 31px;
        z-index: 10;
        display: none;
    }

    .editData {
        visibility: hidden;
    }

    .custom-card-header:hover .editData {
        visibility: visible;
    }
    .category-tag{
        position: relative;
        padding: 5px 10px;
    }
    .category-tag-delete-btn {
        position: absolute;
        top: 1px;
        right: 1px;
    }
</style>
