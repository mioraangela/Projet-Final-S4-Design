<?php

use App\Models\ClientModel;
use CodeIgniter\Test\CIUnitTestCase;

/**
 * @internal
 */
final class ClientModelTest extends CIUnitTestCase
{
    public function testTrouverOuCreerClientCreeUnComptePourUnNumeroInconnu(): void
    {
        $model = new ClientModel();
        $telephone = '03300000000';

        $model->where('telephone', $telephone)->delete();

        $client = $model->trouverOuCreerClient($telephone);

        $this->assertNotNull($client);
        $this->assertSame($telephone, $client['telephone']);
        $this->assertSame('0', (string) $client['solde']);

        $persisted = $model->where('telephone', $telephone)->first();
        $this->assertNotNull($persisted);
        $this->assertSame($client['id'], $persisted['id']);

        $model->delete($client['id']);
    }
}
