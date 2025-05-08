<style>
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }

    .dashboard-index {
        display: flex;
        width: 100%;
    }

    .search-box {
        max-width: 600px;
        margin: 20px auto;
        display: flex;
        flex-direction: column;
    }

    .search-box .search-input,
    .search-input {
        padding: 10px 20px;
        border-radius: 30px;
    }

    .search-box .btn {
        border-radius: 30px;
        margin-top: 20px;
        padding: 10px 20px;
    }

    .scam-item {
        background: #fff;
        border-radius: 15px;
        padding: 10px 20px;
        margin-bottom: 10px;
    }

    .scam-icon {
        color: red;
        margin-right: 10px;
    }

    .btn-scam {
        background: red;
        color: white;
    }

    .btn-trust {
        background: green;
        color: white;
    }

    .flex-hor {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .flex-hor p {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        margin: 0;
    }

    .rating-summary {
        border: 1px solid #ccc;
        padding: 20px;
        max-width: 100%;
        margin: 0 auto;
        background: #fff;
        border-radius: 8px;
    }

    .warning {
        color: red;
        text-align: center;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .stats {
        display: flex;
        justify-content: space-around;
        text-align: center;
        margin-bottom: 20px;
    }

    .stats .count {
        font-size: 24px;
        color: blue;
        font-weight: bold;
    }

    .note {
        text-align: center;
        margin-bottom: 20px;
        font-size: 14px;
    }

    .bar {
        display: flex;
        align-items: center;
        margin: 8px 0;
    }

    .bar .label {
        width: 100px;
        background: #555;
        color: #fff;
        padding: 4px 8px;
        border-radius: 4px;
        margin-right: 10px;
        text-align: center;
        font-size: 13px;
    }

    .bar .value {
        flex: 1;
        background: #eee;
        height: 20px;
        border-radius: 4px;
        overflow: hidden;
    }

    .bar .fill {
        height: 100%;
        background: #0099b1;
        color: white;
        text-align: right;
        padding-right: 5px;
        line-height: 20px;
        font-size: 12px;
    }

    .bar .fill.gray {
        background: #666;
    }

    .summary {
        margin-top: 20px;
        font-size: 14px;
    }

    .disclaimer {
        margin-top: 10px;
        font-size: 12px;
        color: #333;
    }

    .text-align-left {
        text-align: left !important;
        padding: 10px;
    }

    .button-box {
        display: flex;
        align-items: end;
        justify-content: center;
    }

    .button-box a {
        color: red;
        text-decoration: none;
        border: 1px solid red;
        padding: 10px 20px;
        border-radius: 30px;
    }

    .report-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
    }

    .report-form .btn {
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 12px;
        margin: 0;
        padding: 0;
    }

    .section-title {
        color: red;
        text-align: center;
        margin: 30px 0 10px;
        font-weight: bold;
        position: relative;
    }

    .section-title::after {
        content: "";
        display: block;
        width: 60px;
        height: 3px;
        background: red;
        margin: 10px auto 0;
    }

    .grid-1,
    .grid-2 {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
    }

    .grid-2 input,
    .full-width textarea,
    .full-width input[type="file"] {
        flex: 1;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 6px;
    }

    .full-width {
        margin-bottom: 15px;
    }

    .upload-label {
        font-weight: bold;
        display: block;
        margin-bottom: 8px;
        text-align: left;
        padding-left: 0;
    }

    small {
        color: #666;
        display: block;
        margin-top: 5px;
    }

    .title {
        display: block;
        text-align: center !important;
    }

    .rounded {
        border-radius: 16px !important;
    }
</style>