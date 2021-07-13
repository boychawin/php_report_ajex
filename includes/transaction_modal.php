
<div class="modal fade" id="transaction" tabindex="-1" aria-labelledby="transactionLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="transactionLabel">รายละเอียด</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>
                    วันที่: <span id="date"></span> <br>
                    <span>รายการ: <span id="transid"></span></span>
                </p>
                <div class="table-responsive-sm">
                    <table class="table table-striped" cellspacing="0" width="100%">
                        <thead>
                            <th>รายการสินค้า</th>
                            <th>ราคา</th>
                            <th>จำนวน</th>
                            <th>ยอดรวม</th>
                        </thead>
                        <tbody id="detail">
                            <tr>
                                <td colspan="3" align="right"><b>รวม</b></td>
                                <td><span id="total"></span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
            </div>
        </div>
    </div>
</div>