<?php

class Risiko
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function tambahRisiko($nama_risiko, $deskripsi, $likelihood, $impact)
    {
        $risk_score = $likelihood * $impact;
        $kategori = $this->getKategori($risk_score);

        $sql = "INSERT INTO risiko (nama_risiko, deskripsi, likelihood, impact, risk_score, kategori) 
                VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("ssiiis", $nama_risiko, $deskripsi, $likelihood, $impact, $risk_score, $kategori);
        return $stmt->execute();
    }

    public function getRisiko()
    {
        $sql = "SELECT * FROM risiko";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    private function getKategori($score)
    {
        if ($score <= 6) return "LOW";
        if ($score <= 12) return "MEDIUM";
        if ($score <= 15) return "HIGH";
        return "VERY HIGH";
    }

    public function hapusRisiko($id)
{
    $sql = "DELETE FROM risiko WHERE id = ?";
    $stmt = $this->conn->prepare($sql);
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

}
