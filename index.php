<!DOCTYPE html>
<html>
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>تحقق من نوع المقعد</title>
      <style>
         .styled-table {
         border-collapse: collapse;
         margin: 25px 0;
         font-size: 0.9em;
         font-family: sans-serif;
         min-width: 300px;
         box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
         }
         .styled-table thead tr {
         background-color: #673AB7;
         color: #ffffff;
         text-align: left;
         }
         .styled-table th,
         .styled-table td {
         padding: 12px 15px;
         border-left: 1px solid #673ab7;
         border-right: 1px solid #673ab7;
         text-align: center;
         }
         .styled-table tbody tr {
         border-bottom: 1px solid #dddddd;
         }
         .styled-table tbody tr:nth-of-type(even) {
         background-color: #f3f3f3;
         }
         .styled-table tbody tr:last-of-type {
         border-bottom: 2px solid #673AB7;
         }
         button{
         background: #673AB7;
         border: 0;
         padding: 10px;
         color: #fff;
         border-radius: 8px;
         cursor: pointer;
         }
         button:hover{
         background:#563c85;
         }
         select{
         border: 0;
         background: #673AB7;
         color: #fff;
         padding: 5px;
         }
         input{
         background: #673AB7;
         border: 0;
         padding: 6px;
         color: #fff;
         }
         input:focus {
         outline: none;
         }
      </style>
   </head>
   <body>
      <center>
         <?php
            $pr ='';
            function getSeatTypeFirstClass($seatNumber) {
                if ($seatNumber % 3 == 1) {
                    return "شباك";
                } elseif ($seatNumber % 3 == 2) {
                    return "ممر";
                } else {
                    return "شباك";
                }
            }
            
            function getSeatTypeSecondClass($seatNumber) {
                if ($seatNumber % 4 == 1 || $seatNumber % 4 == 0) {
                    return "شباك";
                } else {
                    return "ممر";
                }
            }
            
            if (isset($_POST['seatNumber']) && isset($_POST['class'])) {
                $seatNumber = intval($_POST['seatNumber']);
                $selectedClass = $_POST['class'];
            
                if ($selectedClass == 'first') {
                    $seatType = getSeatTypeFirstClass($seatNumber);
                } elseif ($selectedClass == 'second') {
                    $seatType = getSeatTypeSecondClass($seatNumber);
                }
            $pr = '
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>الدرجة</th>
                        <th>المقعد</th>
                        <th>النوع</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>'.($selectedClass == "first" ? "الأولى" : "الثانية").'</td>
                        <td>'.$seatNumber.'</td>
                        <td>'.$seatType.'</td>
                    </tr>
                </tbody>
            </table>';
            }
            ?>
         <form method="POST" style="display: grid;justify-content: center;margin-top: 50px;border: 1px solid;width: 35%;padding: 50px;background: #0c061663;color: #fff;border-radius: 15px;">
            <label for="seatNumber">الرجاء إدخال رقم المقعد:</label>
            <input type="number" name="seatNumber" id="seatNumber" required>
            <br>
            <br>
            <br>
            <label for="class">الدرجة:</label>
            <select name="class" id="class" required>
               <option value="first">الدرجة الأولى</option>
               <option value="second">الدرجة الثانية</option>
            </select>
            <br>
            <br>
            <br>
            <button type="submit">تحقق</button>
         </form>
         <?php echo $pr; ?>
      </center>
   </body>
</html>
