@extends('layouts.layoutMaster')

@section('title', 'Evaluate Lubricant')

@section('content')
<div class="container">
    <h1>Checklist Used to Evaluate Lubricant</h1>
    <form action="{{ route('submitEvaluation', $companyDetails->id) }}" method="POST">
        @csrf
        <table class="table table-bordered table-hover table-striped">
            <thead style="background-color: #d2dbf5; color: white;">
                <tr>
                    <th>S/No</th>
                    <th>Item</th>
                    <th>Yes/No</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Proof of certification Bodies such as API, NLGI, ACEA</td>
                    <td>
                        <select class="form-control" name="checklist[1][response]" required>
                            <option>--Select--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="checklist[1][remark]" rows="2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Proof of certification from the Original Equipment Manufacturer (OEM)</td>
                    <td>
                        <select class="form-control" name="checklist[2][response]" required>
                            <option>--Select--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="checklist[2][remark]" rows="2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Certification of the additive manufacture with proof of certification issued to the such additive manufacturer from appropriate certification Bodies</td>
                    <td>
                        <select class="form-control" name="checklist[3][response]" required>
                            <option>--Select--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="checklist[3][remark]" rows="2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>Attach a certified copy of the TBS licence for each lubricant (for locally blended lubricants)</td>
                    <td>
                        <select class="form-control" name="checklist[4][response]" required>
                            <option>--Select--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="checklist[4][remark]" rows="2"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>The system should have provision to add new check list</td>
                    <td>
                        <select class="form-control" name="checklist[5][response]" required>
                            <option>--Select--</option>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                    <td>
                        <textarea class="form-control" name="checklist[5][remark]" rows="2"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="form-group">
            <label for="recommendation">Recommendation:</label>
            <select class="form-control" id="recommendation" name="recommendation" required>
                <option value="recommend">Recommend</option>
                <option value="not_recommend">Do Not Recommend</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit Evaluation</button>
    </form>
</div>
@endsection
