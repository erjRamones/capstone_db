<?php

namespace App\Repository;
use App\Interface\Repository\CustomerRepositoryInterface;
use App\Models\Customer;
use Illuminate\Http\Response;

class CustomerRepository implements CustomerRepositoryInterface
{
    public function findMany()
    {
        return Customer::paginate(10);
    }

    public function findOneById($id)
    {
        return Customer::findOrFail($id);
    }

    public function findOneByEmail(string $email)
    {
        return Customer::findOrFail($email);
    }

    public function create(object $payload)
    {
        $customer = new Customer();
        $customer->gorup_id = $payload->group_id;
        $customer->passbook_no = $payload->passbook_no;
        $customer->loan_count = $payload->loan_count;
        $customer->enable_mortuary = $payload->enable_mortuary;
        $customer->mortuary_coverage_start = $payload->mortuary_coverage_start;
        $customer->mortuary_coverage_end = $payload->mortuary_coverage_end;
        $customer->personality_id = $payload->personality_id;
        $customer->save();

        return $customer->fresh();
    }

    public function update(object $payload, int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->gorup_id = $payload->group_id;
        $customer->passbook_no = $payload->passbook_no;
        $customer->loan_count = $payload->loan_count;
        $customer->enable_mortuary = $payload->enable_mortuary;
        $customer->mortuary_coverage_start = $payload->mortuary_coverage_start;
        $customer->mortuary_coverage_end = $payload->mortuary_coverage_end;
        $customer->personality_id = $payload->personality_id;
        $customer->save();

        return $customer->fresh();
    }

    public function delete(int $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json([
            'message' => 'Success'
        ], Response::HTTP_OK);
    }
}
