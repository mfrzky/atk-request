<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATK Request</title>
    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js" integrity="sha384-fbbOQedDUMZZ5KreZpsbe1LCZPVmfTnH7ois6mU1QK+m14rQ1l2bGBq41eYeM/fS" crossorigin="anonymous"></script>

    <!-- SelectSize -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/css/selectize.default.min.css"  integrity="sha512-pTaEn+6gF1IeWv3W1+7X7eM60TFu/agjgoHmYhAfLEU8Phuf6JKiiE8YmsNC0aCgQv4192s4Vai8YZ6VNM6vyQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.15.2/js/selectize.min.js" integrity="sha512-IOebNkvA/HZjMM7MxL0NYeLYEalloZ8ckak+NDtOViP7oiYzG5vn6WVXyrJDiJPhl4yRdmNAG49iuLmhkUdVsQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Data Tables -->
    <link href="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.css" rel="stylesheet"/>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.5/datatables.min.js"></script>

    <!-- Data Tables Checkboxes -->
    <link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
    <script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

    <!-- Swal -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<body>
    <div class="mx-5 mt-3">
        <!-- Add ATK -->
        <header>
            <div class="d-flex justify-content-between align-items-center">
                <h3>
                    ATK Request
                </h3>

                <div class="d-flex align-items-center">
                    <button class="btn border border-success">
                        <i class="fa-solid fa-gear"></i>
                    </button>
                    <button class="btn btn-success mx-3" id="showAddItem" data-toggle="modal" data-target="#modalAddItem" style="background-color: #3ca331; color: white;">
                        <b>+ Add Item</b>
                    </button>
                    <button class="btn border border-success">
                        <i class="fa-solid fa-download"></i>
                    </button>
                </div>
            </div>
        </header>

        <!-- Button Filter -->
        <div class="my-3 row">
            <div class="col-2">
                <span>Company</span>
                <select class="d-block form-select" id="companySelect">
                    <option hidden selected>Select Company</option>
                    <option value="company">Company</option>
                </select>
            </div>
            <div class="col-2">
                <span>Status</span>
                <select class="d-block form-select" id="statusSelect">
                    <option hidden selected>Select Status</option>
                    <option value="Draft">Draft</option>
                    <option value="Waiting Approval">Waiting Approval</option>
                </select>
            </div>
            <div class="col-2">
                <span>Choose Date</span>
                <input type="date" class="d-block form-control" id="inputDate">
            </div>
            <div  class="col-2 d-flex align-items-end">
                <button class="btn me-1" id="filterBtn" style="background-color: #3ca331; color: white;">
                    <i class="fa-solid fa-filter"></i> Filter
                </button>
                <button class="btn btn-danger" id="resetBtn">
                    <i class="fa-regular fa-trash-can"></i> Reset
                </button>
            </div>
        </div>
        
        <!-- Table -->
        <div>
            <table id="tableAtk" class="display table cell-border text-center">
                <thead class="headerTable">
                    <tr style="background-color: #162573; color:white;">
                        <th class="text-center"></th>
                        <th class="text-center">No</th>
                        <th class="text-center">Document No</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">Created By</th>
                        <th class="text-center">Item Count</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td>1</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-07-05</td>
                        <td>John Doe</td>
                        <td>1</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>2</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-01-01</td>
                        <td>John Doe</td>
                        <td>3</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>3</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-02-12</td>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>Waiting Approval</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>4</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-04-01</td>
                        <td>John Doe</td>
                        <td>3</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>5</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-03-13</td>
                        <td>John Doe</td>
                        <td>4</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>6</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-03-01</td>
                        <td>John Doe</td>
                        <td>0</td>
                        <td>Waiting Approval</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>7</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-04-11</td>
                        <td>John Doe</td>
                        <td>3</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>8</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-01-28</td>
                        <td>John Doe</td>
                        <td>2</td>
                        <td>Waiting Approval</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>9</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-01-22</td>
                        <td>John Doe</td>
                        <td>1</td>
                        <td>Waiting Approval</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>10</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-03-12</td>
                        <td>John Doe</td>
                        <td>4</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>11</td>
                        <td>REC/ATK/DUMMY/01</td>
                        <td>2023-02-02</td>
                        <td>John Doe</td>
                        <td>3</td>
                        <td>Draft</td>
                        <td><i class="fa-solid fa-pen-to-square"></i> &nbsp; <i class="fa-solid fa-trash"></i></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- MODAL -->
        <div class="modal fade" id="modalAddItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: #162573;">
                        <h5 class="modal-title" id="exampleModalLabel" style="color: white;">ATK Request</h5>
                        <button type="button" class="btn btn-danger" id="closeModal" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h6><i class="fa-solid fa-circle-exclamation"></i> Atk Request Info</h6>

                        <hr>

                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <span>Warehouse <b class="text-danger">*</b></span>
                                    <select class="mb-2 selectpicker" id="warehouseSelect" required>
                                        <option hidden selected value="">Select Warehouse</option>
                                        <option value="Warehouse">Warehouse</option>
                                        <option value="Auto Matic Warehouse">Auto Matic Warehouse</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <span>Item Name <b class="text-danger">*</b></span>
                                    <select class="d-block form-select mb-2" id="itemNameSelect" required>
                                        <option hidden selected value="">Select Item Name</option>
                                        <option value="Data Item Name">Data Item Name</option>
                                        <option value="Data Item Name User">Data Item Name User</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <span>Quantity <b class="text-danger">*</b></span>
                                    <select class="d-block form-select mb-2" id="quantitySelect" required>
                                        <option hidden selected value="">Select Quantity</option>
                                        <option value="Quantity">Quantity</option>
                                        <option value="Quantity Special">Quantity Special</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <span>Brand <b class="text-danger">*</b></span>
                                    <select class="d-block form-select" id="brandSelect" required>
                                        <option hidden selected value="">Select Brand</option>
                                        <option value="Brand Wow">Brand Wow</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <span>UOM <b class="text-danger">*</b></span>
                                    <select class="d-block form-select mb-2" id="uomSelect" required>
                                        <option hidden selected value="">Select UOM</option>
                                        <option value="UOM">UOM</option>
                                        <option value="UOM Data">UOM Data</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <span>Remarks</span>
                                    <select class="d-block form-select" id="remarksSelect">
                                        <option hidden selected value="">Select Remarks</option>
                                        <option value="Remarks">Remarks</option>
                                        <option value="Remarks Data">Remarks Data</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-flex justify-content-center my-3">
                                <button type="submit" class="btn px-5" id="addAtkRequestInfo" style="background-color: #162573; color:white;">
                                    <b>Add</b>
                                </button>
                            </div>
                        </form>

                        <div class="my-3">
                            <table class="table text-center" id="tableAtkRequestInfo">
                                <thead>
                                    <tr style="background-color: #162573; color:white;">
                                        <th style="border: 1px solid white;">Warehouse</th>
                                        <th style="border: 1px solid white;">Item Name</th>
                                        <th style="border: 1px solid white;">Quantity</th>
                                        <th style="border: 1px solid white;">Brand</th>
                                        <th style="border: 1px solid white;">UOM</th>
                                        <th style="border: 1px solid white;">Remarks</th>
                                        <th style="border: 1px solid white;">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-center mb-3">
                            <button type="button" class="btn px-5" id="saveBtn" style="background-color: #3ca331; color: white;">
                                <b>Save</b>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
    <script>
        $( document ).ready(function() {
            $('.selectpicker').selectize({
                sortField: {
                    field: 'text',
                    direction: 'asc'
                }
            });
            
            $('#showAddItem').click(function() {
                $('#modalAddItem').modal('show'); 
            });

            $('#tableAtk').dataTable({
                'columnDefs': [
                    {
                        'targets': 0,
                        'checkboxes': {
                            'selectRow': true
                        }
                    }
                ],
                'select': {
                    'style': 'multi'
                },
                'order': [[1, 'asc']],
                "oLanguage": {
                    "sLengthMenu": "Showing _MENU_",
                    "sSearch": "",
                    "sSearchPlaceholder": "Search"
                },
                language: {
                    oPaginate: {
                        sNext: "<i class='px-1' style='border: 1px solid #162573'>></i>",
                        sPrevious: "<i class='px-1' style='border: 1px solid #162573'><</i>",
                    }
                }  
            });

            var oTable = $('#tableAtk').dataTable();

            var dataStatus = "";
            var dataDate = "";
            $('#resetBtn').click(function() {
                $('#companySelect').prop("selectedIndex",null);
                $('#statusSelect').prop("selectedIndex",null);
                $('#inputDate').val("");
                oTable.fnFilter("", 6)
                oTable.fnFilter("", 3)
                dataStatus = "";
                dataDate = "";
            });

            $('#statusSelect').change(function() {
                dataStatus = this.value;
            });

            $('#inputDate').change(function() {
                dataDate = this.value;
            });

            $('#filterBtn').click(function() {
                console.log(dataStatus, dataDate)
                oTable.fnFilter(dataStatus, 6); 
                oTable.fnFilter(dataDate, 3); 
            });

            var dataWarehouse = "";
            $('#warehouseSelect').change(function() {
                dataWarehouse = this.value;
            })
            
            var dataUom = "";
            $('#uomSelect').change(function() {
                dataUom = this.value;
            })

            var dataBrand = "";
            $('#brandSelect').change(function() {
                dataBrand = this.value;
            })

            var dataItemName = "";
            $('#itemNameSelect').change(function() {
                dataItemName = this.value;
            })

            var dataQuantity = "";
            $('#quantitySelect').change(function() {
                dataQuantity = this.value;
            })
            
            var dataRemarks = "";
            $('#remarksSelect').change(function() {
                dataRemarks = this.value;
            })

            var myObj = {};
            var json = "";
            $('#addAtkRequestInfo').click(function() {
                if (dataWarehouse == "" || dataUom == "" || dataBrand == "" || dataItemName == "" || dataQuantity == "") {
                    return
                } else {
                    if (dataRemarks == "") {
                        dataRemarks = '-'
                    }

                    var deleteButton = "<button class='btn py-0'><i class='fa-solid fa-trash'></i></button>"

                    var table = $('#tableAtkRequestInfo');
                    var row = "<tr><td>" + dataWarehouse + "</td><td>" + dataUom + "</td><td>" + dataBrand + "</td><td>" + dataItemName + "</td><td>" + dataQuantity + "</td><td>" + dataRemarks + "</td><td>" + deleteButton + "</td></tr>";
                    $("#tableAtkRequestInfo tbody").append(row);

                    myObj["warehouse"] = dataWarehouse;
                    myObj["uom"] = dataUom;
                    myObj["brand"] = dataBrand;
                    myObj["item_name"] = dataItemName;
                    myObj["quantity"] = dataQuantity;
                    myObj["remarks"] = dataRemarks;

                    json = JSON.stringify(myObj);

                    return false;
                }
            });

            $('#closeModal').click(function() {
                $('#modalAddItem').modal('hide');
                
                $("#tableAtkRequestInfo tbody").remove();
                $('#warehouseSelect').val("");
                $('#uomSelect').val("");
                $('#brandSelect').val("");
                $('#itemNameSelect').val("");
                $('#quantitySelect').val("");
                $('#remarksSelect').val("");

                dataWarehouse = "";
                dataUom = "";
                dataBrand = "";
                dataItemName = "";
                dataQuantity = "";
                dataRemarks = "";

                console.log(dataWarehouse)
            });

            $('#saveBtn').click(function() {
                if (json) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: json,
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Atk Request Empty!',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
            });
        });
    </script>
</html>