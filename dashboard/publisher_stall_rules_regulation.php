<style>
    .card {
        max-width: 100%;
    }

    .card ul {
        list-style: none;
        padding: 2%;
    }

    .card table {
        border: solid 2px;

    }

    .card .table-details {
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card span {
        font-weight: bold;
    }
    .address{
        font-size: medium;

    }
</style>





<?php include "header.php";
include "publisher_sidebar.php";
$user_id = $user['id'];
?>

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Terms & Conditions</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Profile</a></li> -->
                                <!-- <li class="breadcrumb-item active">Add</li> -->
                                <a class="dropdown-item" href="logout.php"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end page title -->


            <div class="row">
                <div class="col-xxl-12 mt-0">
                    <!-- Terms-Condition Start-->
                    <div class="card">

                        <ul>
                            <li class="contact-info color-1 bg-hover active hover-bottom p-2">
                                <!-- <h3>Rules & Regulations</h3> -->

                                <h5>
                                    <small>
                                        <ul>
                                            <li>
                                                <h5> <b><span> 1. Overview </b></span></h5>
                                            </li>
                                            <ul>

                                                <li>&emsp;<b>&emsp;1.1</b>&emsp; Allotment of the Stalls to publishers will be at the sole discretion of the Kerala Legislature Secretariat(hereinafter referred to as ‘Organizer’). The Organizer reserves the right to accept or reject Applications without assigning any reason thereof. </li><br>
                                                <li>&emsp;<b>&emsp;1.2</b>&emsp; In case of a natural disaster or if circumstances so warrant, the Organizer reserves the right to postpone, alter or cancel the Fair. In case the Fair is cancelled before the inauguration, rental collected will be refunded at the earliest after deducting the GST.</li><br>
                                                <li>&emsp;<b>&emsp;1.3</b>&emsp; The accepted applications will be considered as an agreement (under the accepted terms) between the exhibitor and the Organizer subject to the availability of space. No correspondence will be done with those exhibitors who fail to get stalls allotted in the fair. </li><br>
                                                <li>&emsp;<b>&emsp;1.4</b>&emsp; Display of relevant banners, posters, etc. on or within the Stall is permitted. However, no display will be allowed outside the Stall. </li><br>
                                                <li>&emsp;<b>&emsp;1.5</b>&emsp; Sale of books and other reading materials will be permitted on the following conditions:<br>
                                                    <ul>
                                                        <li><b>*</b> A minimum discount to be allowed on the printed price at the rate
                                                            mentioned below.</li><br>
                                                        <div class="table-details">
                                                            <table>
                                                                <tr>
                                                                    <th>

                                                                    </th>
                                                                    <th>
                                                                        <label>Malayalam books</label>
                                                                    </th>
                                                                    <th>
                                                                        <label>English books</label>
                                                                    </th>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label>For Individuals</label>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <label>35%</label>

                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <label>35%</label>

                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <label>For Library and
                                                                            Institutional purchase</label>
                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <label>35%</label>

                                                                    </td>
                                                                    <td style="text-align: center;">
                                                                        <label>35%</label>

                                                                    </td>
                                                                </tr>

                                                            </table>
                                                        </div>
                                                        <br>
                                                        <li><b>*</b> No books or materials forbidden by law, including those violating the Copyright Act, should be displayed or sold. Exhibitors will be solely responsible for any violation in this regard and the Organizer will not be liable for such violations. Exhibitors will indemnify the Organizer from and against all proceedings and expenses whatsoever in consequence of any such violation.</li>
                                                    </ul>
                                            </ul>
                                            <li>
                                                <h5> <b><span>2.&emsp; Booking of Space : </span></b></h5>
                                            </li>
                                            <ul>
                                                <li>&emsp;<b>&emsp;2.1</b>&emsp; The process for booking of space at the Fair is on first-cum-first-serve basis</li><br>
                                                <li>&emsp;<b>&emsp;2.2</b>&emsp; No application will be entertained after the last date of booking
                                                    i.e.<span> 20th August 2023.<span></span></li><br>
                                                <li>&emsp;<b>&emsp;2.3</b>&emsp; In case Stall(s) is allotted to an exhibitor, the Organizer will provide duly
                                                    constructed Stall(s) having provision for display of books.</li><br>
                                                <li>&emsp;<b>&emsp;2.4</b>&emsp; Exhibitors are obliged to allow the Organizer to see and check the Stall(s)
                                                    and items at any time during the fair.</li><br>
                                                <li>&emsp;<b>&emsp;2.5</b>&emsp; The maximum number of stalls, one can register and that can be clubbed together is limited to 5.</li>
                                            </ul>
                                            <h5> <b><span>3.&emsp; Withdrawal/Cancellation : </span></b></h5>
                                            <ul>
                                                <li>&emsp;<b>&emsp;3.1</b>&emsp; Once Stall(s) are allotted to an exhibitor, the same cannot be cancelled or altered under any circumstances. No refund of rental will be made.</li><br>
                                                <li>&emsp;<b>&emsp;3.2</b>&emsp; Exhibitors will be deemed to have withdrawn, if for any reason whatsoever, they fail to take possession of the allotted Stall on the date of inauguration of the Fair. The Organizer may, therefore, dispose off the unoccupied space and the said exhibitors will have no right to claim a refund or compensation even if the space is allotted to other exhibitors.</li><br>
                                            </ul>
                                            <h5><b><span>4. Payment : </span></b></h5>
                                            <ul>
                                                <li>&emsp;<b>&emsp;4.1</b>&emsp; Exhibitors need to make remittance towards stall rent after receiving the intimation from the Organizer via email in this regard.</li><br>
                                                <li>&emsp;<b>&emsp;4.2</b>&emsp; The payment receipt should be made available to the Organizer within 48 hours after receiving the confirmation mail.
                                                </li><br>
                                                <li>&emsp;<b>&emsp;4.3</b>&emsp; Payment can be made via RTGS/NEFT/Online Banking.</li>

                                            </ul>

                                            <li>
                                                <b><span>5.&emsp;Allotment of Stalls : </span></b> shall be made by lots. Allotment letters, Stall
                                                Number(s) will be intimated to the exhibitors in advance via email and it will also be
                                                notified on the website.
                                            </li><br>
                                            <li>
                                                <b><span>6.&emsp;Possession :</b> </span>Exhibitors will be given possession of the Stall at 2:00 p.m. on 30 October 2023. The Stalls can not be vacated before the last day of the Fair. 
                                            </li><br>
                                            <li>
                                                <b><span>7.&emsp;Entry : </span></b> will be allowed on production of Letter on confirmation and allotment and
                                                Gate Pass/Temporary Id cards.
                                            </li><br>
                                            <li>
                                                <b><span>8.&emsp;Vacation of Stalls : </b></span> It shall be the responsibility of the exhibitors to remove all
                                                exhibits, tools and other materials at the end of the Fair and leave the Stalls in the
                                                same condition in which they were allotted to them. If any panels, racks, tables or
                                                any other item provided are found to be broken/not further useable or missing, then
                                                the cost of those items will be borne by the respective exhibitor.
                                            </li><br>
                                            <li>
                                                <b><span>9.&emsp; Removal of Displays and Goods :</b></span> No goods or displays shall be removed from the
                                                Stalls during the Fair without the written permission of the Organizer
                                            </li><br>
                                            <li>
                                                <b><span>10.&emsp;Cleaning :</b> </span>The Organizer will carry out general cleaning, exhibitors will be
                                                responsible for the cleanliness of their respective Stalls during the Fair.
                                            </li><br>
                                            <li>
                                                <b><span>11.&emsp; Timings for Exhibition :</b> </span>Exhibition time - <b>10.00 a.m. to 10.00 p.m .</b> Exhibitors will
                                                be allowed entry into the Stalls from <b>9.00 a.m.</b> and they have to vacate the Stalls
                                                latest by <b></b>11.00 p.m .</b> every day during the Fair.
                                            </li><br>
                                            <li>
                                                <b><span>12.&emsp;Modification of Terms and Conditions :</b></span> Any of the terms and conditions
                                                mentioned above may be relaxed or modified at the discretion of the Secretary,
                                                Kerala Legislature Secretariat whose decision will be final and binding.
                                            </li><br>
                                            <li>
                                                <b><span>13.&emsp; Security :</b></span>
                                                The Organizer will provide round-the-clock security arrangements during the Fair.
                                                However, the Organizer is not liable for the loss or damage to the goods and property
                                                of the exhibitors. Exhibitors are, therefore, advised not to leave their Stalls or their
                                                belongings unattended during the Fair timings.
                                            </li><br>
                                            <li>
                                                <b><span>14.&emsp;Jurisdiction :</b></span> Any dispute or claim arising out of the participation in the Fair will be subjected to
                                                the exclusive jurisdiction of the Thiruvananthapuram Courts.
                                            </li><br>
                                            <li>
                                                <h5><b><span>15. Others:</b></h5>
                                                <ul>
                                                    <li>&emsp;<b>&emsp;15.1&emsp;</b> Use of polythene bags is prohibited. Therefore, all exhibitors are required to strictly adhere to this ban.</li><br>
                                                    <li>&emsp;<b>&emsp;15.2&emsp;</b> Strictly adhere to Green protocol and Covid-19 protocol during the Fair.</li><br>
                                                    <li>&emsp;<b>&emsp;15.3&emsp;</b> Exhibitors also should ensure to maintain the sanctity of Assembly premises.</li><br>
                                                    <li>&emsp;<b>&emsp;15.4&emsp;</b> The Organizer reserves the right to alter the dimensions of the stall without assigning any reason thereof and the Organizer’s decision will be final and binding on the exhibitors. However, in such a case, exhibitors will be informed in advance. Publishers are allowed to sell only titles owned by them or authorized to be sold by them</li>
                                                </ul>

                                </h5>
                             
                                <div class="address">
                                    <h4><b>Address for Communication</b><br></h4>
                                    <b>Secretary</b><br>
                                    Kerala Legislature Secretariat,
                                    Vikas Bhavan P.O.,<br>
                                    Thiruvananthapuram, Kerala- 695033<br>
                                    <b> Email:</b> klibf.kla@gmail.com,
                                    secretary@niyamasabha.nic.in<br>
                                   <b> Phone:</b> 0471-2512310 / Mob. no. 9188380058<br>
                                    <b>Website: </b>http://klibf.niyamasabha.org
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Terms-Condition End-->
            </div>


        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->

    <?php include "footer.php"; ?>