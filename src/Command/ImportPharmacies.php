<?php
namespace App\Command;

use App\Entity\Pharmacy;
use Doctrine\ORM\EntityManagerInterface;
use League\Csv\Reader;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportPharmacies extends Command
{

    /**
     *
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * ImportPharmacies constructor.
     *
     * @param EntityManagerInterface $em
     *
     * @throws \Symfony\Component\Console\Exception\LogicException
     */
    public function __construct(EntityManagerInterface $em)
    {
        parent::__construct();

        $this->em = $em;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Symfony\Component\Console\Command\Command::configure()
     */
    protected function configure()
    {
        $this->setName('import:pharmacies');
        $this->setDescription('Imports pharmacy records from ./var/pharmacies.csv into a new database');
    }

    /**
     *
     * {@inheritdoc}
     * @see \Symfony\Component\Console\Command\Command::execute()
     */
    protected function execute(\Symfony\Component\Console\Input\InputInterface $input, \Symfony\Component\Console\Output\OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Importing records ...');

        $csvReader = Reader::createFromPath('%kernel.root_dir%/../var/pharmacies.csv', 'r');
        $csvReader->setHeaderOffset(0);
        $records = $csvReader->getRecords();
        $recordCount = 0;
        foreach ($records as $row) {

            // Create a new pharmacy record and store in database
            $pharmacy = new Pharmacy();

            $pharmacy->setName($row['name']);
            $pharmacy->setAddress($row['address']);
            $pharmacy->setCity($row['city']);
            $pharmacy->setState($row['state']);
            $pharmacy->setZip($row['zip']);
            $pharmacy->setLatitude($row['latitude']);
            $pharmacy->setLongitude($row['longitude']);

            // Save this record
            $this->em->persist($pharmacy);
            $recordCount ++;
        }

        // Flush the entity manager and store into database
        $this->em->flush();
        $io->success("Import completed! ($recordCount) records imported");
    }
}

