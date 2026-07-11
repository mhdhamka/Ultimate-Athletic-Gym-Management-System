<!DOCTYPE html>
<html>
<head>
    <title>Invoice</title>
    <style rel="stylesheet" type="text/css">

.receipt-content .invoice-wrapper {
  background: #FFF;
  border: 1px solid #CDD3E2;
  box-shadow: 0px 0px 1px #CCC;
  padding: 40px;
  margin:auto;
  margin-top: 20px;
  border-radius: 4px;
  width: 1000px; 
}

.receipt-content .invoice-wrapper .payment-details span {
  color: #A9B0BB;
  display: block; 
}
.receipt-content .invoice-wrapper .payment-details a {
  display: inline-block;
  margin-top: 5px; 
}


.print a:hover {
  text-decoration: none;
  border-color: #333;
  color: #333; 
}

.receipt-content {
  width: 1200px;
  margin: auto;

}

.logo  {
  text-align: center;
}

img {
    display: block;
    margin: auto;
    text-align: center;
    width: 200px;
}

.receipt-content .invoice-wrapper .intro {
  line-height: 25px;
  color: #444; 
}

.receipt-content .invoice-wrapper .payment-info {
  margin-top: 25px;
  padding-top: 15px; 
}

.receipt-content .invoice-wrapper .payment-info span {
  color: #A9B0BB; 
}

.receipt-content .invoice-wrapper .payment-info strong {
  display: block;
  color: #444;
  margin-top: 3px; 
}


.receipt-content .invoice-wrapper .payment-details {
  border-top: 2px solid #EBECEE;
  margin-top: 30px;
  padding-top: 20px;
  line-height: 22px; 
}

.receipt-content .invoice-wrapper .payment-details {
  border-top: 2px solid #EBECEE;
  margin-top: 30px;
  padding-top: 20px;
  line-height: 22px; 
}


.print {
  margin-top: 50px;
  text-align: center; 
  clear: both;
  padding: 10px;
}


.Client {
    float: left;
}

.Company {
    float: right;
}

.items{
    clear: both;
      border-top: 2px solid #EBECEE;
}

table,tr,th,td {
    border: 0.5px solid;
    text-align: center;
    padding: 10px;
    width: 100%;
    margin: auto;
}

table {
    border-collapse: collapse;
}

.extra-notes{
    float: left;
    width: 50%;
    font-size: 15px;

}

.total{
    margin-top: 5px;
    float: right;
    text-align: left;
    width: 300px;
}

.receipt-content .footer {
  margin-top: 40px;
  text-align: center;
  font-size: 12px;
  color: #969CAD; 
}
    </style>

</head>

<body>
<div class="receipt-content">       
                <div class="invoice-wrapper">
                    <div class="logo">
                    <img src="assets/images/logo.png" alt="Logo MGDB"> 
                    <h3>Ultimate Athletics Fitness</h3>
                    </div>
                    <div class="intro">
                        Hi <strong>Mohd Hamka Izzudin</strong>, 
                        <br>
                        Thank you for choosing Ultimate Athletics Fitness as your favourite gym!
                    </div>

                    <div class="payment-info">
                            <div class="col-sm-6">
                                <span>Invoice:</span>
                                <strong>INV-0125</strong>
                            </div>
                            <div class="col-sm-6 text-right">
                                <span>Payment Date</span>
                                <strong>9 November 2022</strong>
                            </div>
                            <div class="col-sm-6">
                                <span>Payment Methd</span>
                                <strong>Cash</strong>
                            </div>
                           
                    </div>

                    <div class="payment-details">
                            <div class="Client">
                                <span>Client</span>
                                <strong>
                                Mohd Hamka Izzudin
                                </strong>
                                <p>
                                    M771014<br>
                                    <a href="#">
                                        hamka@gmail.com
                                    </a>
                                </p>
                            </div>
                            <div class="Company">
                                <span>Payment To</span>
                                <strong>
                                    Ultimate Athletics Fitness
                                </strong>
                                <p>
                                    Sublot 1 & 2, 3rd Floor, Lot 3022, <br>
                                    Desa Ilmu 2,<br>
                                    Lor Desa Ilmu 22M1, 94300 <br>
                                    Kota Samarahan, Sarawak <br>
                                    <a href="#">
                                        ultimatemalaysia14@gmail.com
                                    </a>
                                </p>
                            </div>

                    </div>

                        <div class="items">
                        <table class="table">
                        <p>Purchase Details: </p>  
                        <tr>
                            <th>Purchase</th>
                            <th>Date</th>
                            <th>Unit Price</th>
                            <th>Total</th>
                            </tr>
                            <tr>
                            <td>Renew Membership for ONE year</td>
                            <td>Start: 9/11/2022<br> End: 9/11/2023 </td>
                            <td>RM1080</td>
                            <td>RM1080</td>
                            </tr>
                        </table>
                        </div>
                      
                        <div class="extra-notes">
                            <p>
                                <strong>Extra Notes</strong></p>
                                <p>Please do not forget screenshot or print invoice to show in the counter later.</p>
                            
                        </div>
                            
                        <div class="print">
                            <a href="#">
                                <i class="fa fa-print"></i>
                                <button onclick="window.print()"> PRINT</button>
                            </a>
                        </div>
                    

                <div class="footer">
                     <p>Copyright &copy; 2022 Ultimate Athletics FITNESS - Distributed by TME3413 Group 6 Castor</p>
                </div>

            </div>

</div>   

</body>
</html>

