<!doctype html>
<html lang="en">

    <style>
        .button {
          background-color: #4CAF50;
          border: none;
          color: white;
          padding: 15px 32px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 16px;
          margin: 4px 2px;
          cursor: pointer;
        }
    </style>

<body>
    <div>
        <p>Dear {{ $supplier->first_name . ' ' . $supplier->last_name }},</p>
        <p>Your account has been created. Please click the following link to active your account:</p>
        <a href="{{ route('vendor.login.form') }}" class="button">
            Active
        </a>
        <br/>

        <p>Thanks!</p>
    </div>
</body>
</html>
